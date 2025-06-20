<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Pages;

use App\Filament\Resources\StatementAssetsResource;
use App\Models\StatementAssets;
use Filament\Resources\Pages\CreateRecord;

class CreateStatementAssets extends CreateRecord
{
    protected static string $resource = StatementAssetsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['filename'] = StatementAssets::copyFile($data['source_file_id']);

        unset($data['source_file_id']);

        return $data;
    }
}
