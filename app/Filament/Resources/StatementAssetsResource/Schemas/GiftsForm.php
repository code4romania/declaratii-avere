<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Enums\BeneficiaryType;
use App\Forms\Components\MoneyInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Marvinosswald\FilamentInputSelectAffix\TextInputSelectAffix;

class GiftsForm
{
    public static function getSection(): Section
    {
        return Section::make(__('app.headings.gifts'))
            ->collapsible()
            ->schema([
                Repeater::make('gifts')
                    ->relationship('gifts')
                    ->hiddenLabel()
                    ->reorderable(false)
                    ->defaultItems(0)
                    ->schema([
                        TextInputSelectAffix::make('name')
                            ->label(__('app.field.income_beneficiary'))
                            ->required()
                            ->maxLength(255)
                            ->select(
                                fn () => Select::make('beneficiary_type')
                                    ->hiddenLabel()
                                    ->options(BeneficiaryType::options())
                                    ->extraAttributes(['class' => 'w-20'])
                                    ->required()
                            ),

                        TextInput::make('source')
                            ->label(__('app.field.income_source'))
                            ->maxLength(255)
                            ->required(),

                        TextInput::make('description')
                            ->label(__('app.field.income_description'))
                            ->maxLength(255)
                            ->required(),

                        MoneyInput::make('value')
                            ->label(__('app.field.income_value'))
                            ->required(),
                    ]),
            ]);
    }
}
