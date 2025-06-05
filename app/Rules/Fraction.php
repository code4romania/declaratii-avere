<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Fraction implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Accepts fractions written in text format, e.g. "1/2", "3/4", "10/3"
        if (! \is_string($value) || ! preg_match('/^\d+\/\d+$/', $value)) {
            $fail('The :attribute must be a valid fraction (e.g. 1/2, 3/4).');

            return;
        }

        [$numerator, $denominator] = explode('/', $value);

        if (
            $denominator === 0 ||
            $numerator <= 0 ||
            $numerator > $denominator
        ) {
            $fail('The :attribute must be a valid fraction (e.g. 1/2, 3/4).');
        }
    }
}
