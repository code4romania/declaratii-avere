<?php

declare(strict_types=1);

namespace App\Models\StatementInterests;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $table = 'statement_interests_parties';

    protected $fillable = [
        'title',
    ];
}
