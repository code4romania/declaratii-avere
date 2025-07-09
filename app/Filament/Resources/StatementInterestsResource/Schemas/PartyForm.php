<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementInterestsResource\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;

class PartyForm
{
    public static function getSection(): Section
    {
        return Section::make(__('app.headings.party'))
            ->collapsible()
            ->schema([

                Repeater::make('parties')
                    ->relationship('parties')
                    ->hiddenLabel()
                    ->reorderable(false)
                    ->defaultItems(0)
                    ->simple(
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                    ),

            ]);
    }
}
