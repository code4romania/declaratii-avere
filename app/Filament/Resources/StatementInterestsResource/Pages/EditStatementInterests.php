<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementInterestsResource\Pages;

use App\Filament\Resources\StatementInterestsResource;
use App\Models\StatementInterests;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatementInterests extends EditRecord
{
    protected static string $resource = StatementInterestsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            StatementInterestsResource\Actions\ValidateAction::make(),
            Actions\Action::make('view')
                ->label(__('app.actions.view.button'))
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->url(fn (StatementInterests $record) => $record->url)
                ->openUrlInNewTab()
                ->outlined(),
        ];
    }
}
