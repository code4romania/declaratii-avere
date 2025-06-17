<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Storage;

class Document extends Model
{
    use Prunable;

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

    protected static function booted(): void
    {
        static::retrieved(function (Document $model) {
            if (empty($model->started_processing_at)) {
                $model->started_processing_at = now();
                $model->save();
            }
        });
    }

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

    #[Scope]
    protected function shouldBeProcessed(Builder $query): Builder
    {
        return $query->whereNull('started_processing_at');
    }

    #[Scope]
    protected function shouldBeValidate(Builder $query): Builder
    {
        return $query->whereNotNull('finished_processing_at')
            ->where('started_validation_at', null);
    }
}
