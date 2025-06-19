<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Pages;

use App\Filament\Resources\StatementAssetsResource;
use App\Models\SourceFile;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateStatementAssets extends CreateRecord
{
    protected static string $resource = StatementAssetsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $sourceFile = SourceFile::find($data['source_file_id']);
        $data['filename'] = "assets/{$sourceFile->filename}";

        Storage::writeStream($data['filename'], Storage::disk('s3-source')->readStream("source/{$sourceFile->filename}"));

        $sourceFile->update([
            'finished_processing_at' => now(),
        ]);

        return $data;
    }
}
