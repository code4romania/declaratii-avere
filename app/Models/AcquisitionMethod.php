<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcquisitionMethod extends Model
{
    public $timestamps = false;

    public $fillable = [
        'name',
    ];
}
