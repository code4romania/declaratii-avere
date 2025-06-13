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
        return Section::make('VI. Cadouri, servicii sau avantaje primite gratuit sau subvenționate față de valoarea de piață, din partea unor persoane, organizații, societăți comerciale, regii autonome, companii/societăți naționale sau instituții publice românești sau străine, inclusiv burse, credite, garanții, decontări de cheltuieli, altele decât cele ale angajatorului, a căror valoare individuală depășește 500 de euro')
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
                                Select::make('beneficiary_type')
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
