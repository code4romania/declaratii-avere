<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class PersonForm
{
    public static function getSection(): Section
    {
        return Section::make()
            ->schema([
                Select::make('person_id')
                    ->label(__('app.field.person'))
                    ->relationship('person', 'name')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label(__('app.field.person_name'))
                            ->required(),
                    ])
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('position_id')
                    ->label(__('app.field.position'))
                    ->relationship('position', 'title')
                    ->createOptionForm([
                        TextInput::make('title')
                            ->label(__('app.field.position_title'))
                            ->required(),

                        Select::make('institution_id')
                            ->label(__('app.field.institution'))
                            ->relationship('institution', 'name')
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label(__('app.field.institution_name'))
                                    ->required(),
                            ])
                            ->searchable()
                            ->required(),
                    ])
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
