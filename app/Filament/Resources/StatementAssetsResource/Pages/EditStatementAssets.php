<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Pages;

use App\Filament\Resources\StatementAssetsResource;
use App\Models\StatementAssets;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatementAssets extends EditRecord
{
    protected static string $resource = StatementAssetsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            StatementAssetsResource\Actions\ValidateAction::make(),
            Actions\Action::make('view')
                ->label(__('app.actions.view.button'))
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->url(fn (StatementAssets $record) => $record->url)
                ->openUrlInNewTab()
                ->outlined(),
        ];
    }
}
