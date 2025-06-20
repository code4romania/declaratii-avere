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
        return Section::make('4. Calitatea de membru în organele de conducere, administrare și control, retribuite sau neretribuite, deținute în cadrul partidelor politice, funcția deținută și denumirea partidului politic')
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
