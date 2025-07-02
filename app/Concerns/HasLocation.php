<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasLocation
{
    public function location(): Attribute
    {
        return Attribute::make(function () {
            $parts = $this->country_id === 'RO'
                ? [$this->county->name, $this->locality->name]
                : [$this->country->name, $this->foreign_locality];

            return collect($parts)
                ->filter()
                ->implode(', ');
        });
    }
}
