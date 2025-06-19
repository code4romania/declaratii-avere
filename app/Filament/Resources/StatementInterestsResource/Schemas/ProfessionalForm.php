<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementInterestsResource\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;

class ProfessionalForm
{
    public static function getSection(): Section
    {
        return Section::make('3. Calitatea de membru în cadrul asociaţiilor profesionale şi/sau sindicale')
            ->collapsible()
            ->schema([

                Repeater::make('professionals')
                    ->relationship('professionals')
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
