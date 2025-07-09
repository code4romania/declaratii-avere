<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementInterestsResource\Schemas;

use App\Enums\InterestShareType;
use App\Enums\ShareholderType;
use App\Forms\Components\MoneyInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Marvinosswald\FilamentInputSelectAffix\TextInputSelectAffix;

class ShareholderForm
{
    public static function getSection(): Section
    {
        return Section::make(__('app.headings.shareholder'))
            ->collapsible()
            ->schema([

                Repeater::make('shareholders')
                    ->relationship('shareholders')
                    ->hiddenLabel()
                    ->reorderable(false)
                    ->defaultItems(0)
                    ->schema([
                        TextInput::make('name')
                            ->label(__('app.field.shareholder_unit'))
                            ->required()
                            ->maxLength(255),

                        Select::make('type')
                            ->label(__('app.field.shareholder_type'))
                            ->options(ShareholderType::options())
                            ->enum(ShareholderType::class)
                            ->required(),

                        TextInputSelectAffix::make('share')
                            ->label(__('app.field.shareholder_shares'))
                            ->minValue(0)
                            ->integer()
                            ->required()
                            ->position('prefix')
                            ->select(
                                fn () => Select::make('share_type')
                                    ->label(__('app.field.type'))
                                    ->options(InterestShareType::options())
                                    ->extraAttributes(['class' => 'w-32'])
                                    ->required()
                            ),

                        MoneyInput::make('value')
                            ->label(__('app.field.value'))
                            ->required(),
                    ]),

            ]);
    }
}
