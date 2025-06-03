<?php

namespace App\Filament\Resources\StatementAssetsResource\Pages;

use App\Filament\Resources\StatementAssetsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatementAssets extends EditRecord
{
    protected static string $resource = StatementAssetsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
