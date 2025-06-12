<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Storage;

class Document extends Model
{
    protected $connection = 'mysql-documents';

    protected $table = 'declarations';

    protected $fillable = [
        'county_id',
        'locality_id',
        'type',
        'full_name',
        'institution',
        'position',
        'filename',
        'original_filename',
        'ip_address',
    ];

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    public function locality(): BelongsTo
    {
        return $this->belongsTo(Locality::class);
    }

    public function getPdfUrl(): string
    {
        return Storage::disk('s3-cd')->temporaryUrl('source/' . $this->filename, now()->addMinutes(50));
    }
}
