<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementInterestsResource\Pages;

use App\Filament\Resources\StatementInterestsResource;
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
        ];
    }
}
