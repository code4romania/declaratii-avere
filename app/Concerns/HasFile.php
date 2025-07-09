<?php

declare(strict_types=1);

namespace App\Concerns;

use App\Models\SourceFile;
use Illuminate\Support\Facades\Storage;

trait HasFile
{
    public function initializeHasFile(): void
    {
        $this->fillable[] = 'filename';
    }

    public function getPdfUrl(): string
    {
        return Storage::temporaryUrl($this->filename, now()->addHour());
    }

    public static function copyFile(int $sourceFileId): string
    {
        $sourceFile = SourceFile::find($sourceFileId);
        $filename = "assets/{$sourceFile->filename}";

        Storage::writeStream($filename, Storage::disk('s3-source')->readStream("uploads/{$sourceFile->filename}"));

        $sourceFile->update([
            'finished_processing_at' => now(),
        ]);

        return $filename;
    }
}
