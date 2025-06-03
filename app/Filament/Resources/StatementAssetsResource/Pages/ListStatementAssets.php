<?php

namespace App\Filament\Resources\StatementAssetsResource\Pages;

use App\Filament\Resources\StatementAssetsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatementAssets extends ListRecords
{
    protected static string $resource = StatementAssetsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
