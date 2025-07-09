<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\DeclarationType;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class SourceFile extends Model
{
    protected $connection = 'mysql-source';

    protected $table = 'declarations';

    protected $fillable = [
        'started_processing_at',
        'finished_processing_at',
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
        return Storage::disk('s3-source')->temporaryUrl('uploads/' . $this->filename, now()->addHour());
    }

    public static function getAssetsFile(): ?self
    {
        return self::getFile(DeclarationType::ASSETS);
    }

    public static function getInterestsFile(): ?self
    {
        return self::getFile(DeclarationType::INTERESTS);
    }

    private static function getFile(DeclarationType $declarationType): ?self
    {
        $file = self::query()
            ->where('type', $declarationType)
            ->whereNotStartedProcessing()
            ->first();

        if (blank($file)) {
            return null;
        }

        $file->started_processing_at = now();
        $file->save();

        return $file;
    }

    #[Scope]
    protected function whereAssets(Builder $query): Builder
    {
        return $query->where('type', DeclarationType::ASSETS);
    }

    #[Scope]
    protected function whereInterests(Builder $query): Builder
    {
        return $query->where('type', DeclarationType::INTERESTS);
    }

    #[Scope]
    protected function whereNotStartedProcessing(Builder $query): Builder
    {
        return $query->whereNull('started_processing_at');
    }

    #[Scope]
    protected function whereNeedToBeRestarted(Builder $query): Builder
    {
        $statedAt = now()->subMinutes(config('session.lifetime'));

        return $query->where('started_processing_at', '<', $statedAt)
            ->whereNull('finished_processing_at');
    }
}
