<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Enums\AccountCategory;
use App\Enums\PlacementCategory;
use App\Enums\PlacementShareType;
use App\Forms\Components\MoneyInput;
use App\Rules\Fraction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Marvinosswald\FilamentInputSelectAffix\TextInputSelectAffix;

class FinancialAssetsForm
{
    public static function getSection(): Section
    {
        return Section::make('IV. Active financiare')
            ->schema([
                static::getAccountsRepeater(),
                static::getPlacementsRepeater(),
                static::getAssetsRepeater(),
            ]);
    }

    private static function getAccountsRepeater(): Repeater
    {
        return Repeater::make('accounts')
            ->relationship('accounts')
            ->label(__('app.section.financial_accounts'))
            ->reorderable(false)
            ->schema([
                TextInput::make('name')
                    ->label(__('app.field.account_institution_name'))
                    ->required()
                    ->maxLength(255),

                Select::make('category')
                    ->label(__('app.field.type'))
                    ->options(AccountCategory::options())
                    ->required(),

                TextInput::make('year')
                    ->label(__('app.field.account_year'))
                    ->integer()
                    ->required()
                    ->minValue(1900)
                    ->maxValue(date('Y')),

                MoneyInput::make('value')
                    ->label(__('app.field.value'))
                    ->required(),
            ]);
    }

    private static function getPlacementsRepeater(): Repeater
    {
        return Repeater::make('placements')
            ->relationship('placements')
            ->label(__('app.section.financial_placements'))
            ->reorderable(false)
            ->schema([
                TextInput::make('name')
                    ->label(__('app.field.placement_name'))
                    ->required()
                    ->maxLength(255),

                Select::make('category')
                    ->label(__('app.field.placement_category'))
                    ->options(PlacementCategory::options())
                    ->required(),

                TextInputSelectAffix::make('share')
                    ->label(__('app.field.placement_share'))
                    ->placeholder(fn (Get $get) => PlacementShareType::isValue($get('share_type'), PlacementShareType::FRACTION) ? '1/2' : '100')
                    ->integer(
                        fn (Get $get) => PlacementShareType::isValue($get('share_type'), PlacementShareType::TITLURI)
                    )
                    ->rule(
                        new Fraction,
                        fn (Get $get) => PlacementShareType::isValue($get('share_type'), PlacementShareType::FRACTION)
                    )
                    ->rule(
                        ['min:0', 'max:100'],
                        fn (Get $get) => PlacementShareType::isValue($get('share_type'), PlacementShareType::PRECENT)
                    )
                    ->integer(
                        fn (Get $get) => PlacementShareType::isValue($get('share_type'), PlacementShareType::PRECENT) ||
                            PlacementShareType::isValue($get('share_type'), PlacementShareType::TITLURI)
                    )
                    ->required()
                    ->position('prefix')
                    ->select(
                        Select::make('share_type')
                            ->label(__('app.field.share_type'))
                            ->options(PlacementShareType::options())
                            ->extraAttributes(['class' => 'w-24'])
                            ->required()
                            ->live()
                    ),

                MoneyInput::make('value')
                    ->label(__('app.field.placement_value'))
                    ->required(),
            ]);
    }

    private static function getAssetsRepeater(): Repeater
    {
        return Repeater::make('assets')
            ->relationship('assets')
            ->label(__('app.section.financial_assets'))
            ->reorderable(false)
            ->schema([
                TextInput::make('description')
                    ->label(__('app.field.description'))
                    ->required()
                    ->maxLength(255),

                MoneyInput::make('value')
                    ->label(__('app.field.value'))
                    ->required(),
            ]);
    }
}
