<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementInterestsResource\Pages;

use App\Filament\Resources\StatementInterestsResource;
use App\Models\StatementInterests;
use Filament\Resources\Pages\CreateRecord;

class CreateStatementInterests extends CreateRecord
{
    protected static string $resource = StatementInterestsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['filename'] = StatementInterests::copyFile($data['source_file_id']);

        unset($data['source_file_id']);

        return $data;
    }
}
