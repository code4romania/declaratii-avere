<?php

declare(strict_types=1);

namespace App\Forms\Components;

use Cknow\Money\Money;
use Closure;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Support\RawJs;
use Marvinosswald\FilamentInputSelectAffix\TextInputSelectAffix;
use NumberFormatter;

class MoneyInput extends TextInputSelectAffix
{
    protected string | Closure | null $currencyField = null;

    public function currencyField(string | Closure | null $currencyField): static
    {
        $this->currencyField = $currencyField;

        return $this;
    }

    public function getCurrencyField(): ?string
    {
        return $this->evaluate($this->currencyField) ?? 'currency';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $currencyField = $this->getCurrencyField();

        $this->mask(function () {
            $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::CURRENCY);

            return RawJs::make(
                strtr(
                    '$money($input, \'{decimalSeparator}\', \'{groupingSeparator}\', {fractionDigits})',
                    [
                        '{decimalSeparator}' => $formatter->getSymbol(NumberFormatter::DECIMAL_SEPARATOR_SYMBOL),
                        '{groupingSeparator}' => $formatter->getSymbol(NumberFormatter::GROUPING_SEPARATOR_SYMBOL),
                        '{fractionDigits}' => $formatter->getAttribute(NumberFormatter::FRACTION_DIGITS),
                    ]
                )
            );
        });

        $this->select(
            fn () => Select::make($currencyField)
                ->extraAttributes([
                    'class' => 'w-20',
                ])
                ->options(
                    collect(Money::getCurrencies())
                        ->map->getCode()
                        ->mapWithKeys(fn (string $code) => [$code => $code])
                )
                ->default(fn (Get $get) => $get($currencyField) ?: config('money.defaultCurrency'))
                ->required()
        );

        $this->formatStateUsing(function (self $component, $record, $state): ?string {
            if (blank($state) || blank($state['amount']) || blank($state['currency'])) {
                return null;
            }

            return Money::parse($state['amount'], $state['currency'])
                ->formatByIntlLocalizedDecimal(
                    app()->getLocale(),
                    style: NumberFormatter::DECIMAL
                );
        });

        $this->dehydrateStateUsing(function (self $component, Get $get, $state) use ($currencyField) {
            $money = Money::parseByIntlLocalizedDecimal($state, $get($currencyField) ?: config('money.defaultCurrency'));

            return (string) $money->getAmount();
        });
    }
}
