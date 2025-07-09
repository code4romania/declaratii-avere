<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementInterestsResource\Schemas;

use App\Enums\ContractBeneficiaryType;
use App\Forms\Components\MoneyInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Marvinosswald\FilamentInputSelectAffix\TextInputSelectAffix;

class ContractForm
{
    public static function getSection(): Section
    {
        return Section::make(__('app.headings.contract'))
            ->collapsible()
            ->schema([

                Repeater::make('contracts')
                    ->relationship('contracts')
                    ->hiddenLabel()
                    ->reorderable(false)
                    ->defaultItems(0)
                    ->schema([
                        TextInputSelectAffix::make('name')
                            ->label(__('app.field.contract_beneficiary'))
                            ->required()
                            ->maxLength(255)
                            ->select(
                                Select::make('beneficiary_type')
                                    ->hiddenLabel()
                                    ->options(ContractBeneficiaryType::options())
                                    ->extraAttributes(['class' => 'w-32'])
                                    ->required()
                            ),

                        TextInput::make('institution')
                            ->label(__('app.field.contract_institution'))
                            ->maxLength(255)
                            ->required(),

                        TextInput::make('procedure')
                            ->label(__('app.field.contract_procedure'))
                            ->maxLength(255)
                            ->required(),

                        TextInput::make('type')
                            ->label(__('app.field.contract_type'))
                            ->maxLength(255)
                            ->required(),

                        DatePicker::make('date')
                            ->label(__('app.field.contract_date'))
                            ->required(),

                        TextInput::make('duration')
                            ->label(__('app.field.contract_duration'))
                            ->maxLength(255)
                            ->required(),

                        MoneyInput::make('value')
                            ->label(__('app.field.contract_value'))
                            ->required(),
                    ]),

            ]);
    }
}
