<?php

declare(strict_types=1);

namespace App\Models\StatementInterests;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    protected $table = 'statement_interests_professionals';

    protected $fillable = [
        'title',
    ];
}
