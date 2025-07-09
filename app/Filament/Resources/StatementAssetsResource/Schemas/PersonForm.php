<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Enums\StatementType;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class PersonForm
{
    public static function getSection(): Section
    {
        return Section::make()
            ->schema([
                Select::make('type')
                    ->label(__('app.field.type'))
                    ->options(StatementType::options())
                    ->required(),

                Select::make('person_id')
                    ->label(__('app.field.person'))
                    ->helperText(__('app.help_text.person'))
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
                    ])
                    ->searchable()
                    ->preload()
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
                    ->preload()
                    ->required(),

                TextInput::make('party')
                    ->label(__('app.field.party'))
                    ->maxLength(255),
            ]);
    }
}
