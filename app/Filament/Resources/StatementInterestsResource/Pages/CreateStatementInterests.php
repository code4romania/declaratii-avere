<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementInterestsResource\Pages;

use App\Filament\Resources\StatementInterestsResource;
use App\Models\SourceFile;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateStatementInterests extends CreateRecord
{
    protected static string $resource = StatementInterestsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $sourceFile = SourceFile::find($data['source_file_id']);
        $data['filename'] = "interests/{$sourceFile->filename}";

        Storage::writeStream($data['filename'], Storage::disk('s3-source')->readStream("source/{$sourceFile->filename}"));

        $sourceFile->update([
            'finished_processing_at' => now(),
        ]);

        return $data;
    }
}
