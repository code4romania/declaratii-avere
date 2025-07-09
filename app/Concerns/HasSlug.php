<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    public function initializeHasSlug(): void
    {
        $this->fillable[] = 'slug';
    }

    public function getSlugFieldSource(): string
    {
        return $this->slugFieldSource ?? 'title';
    }

    public static function bootHasSlug(): void
    {
        static::creating(fn (Model $model) => $model->fillSlugs());
        static::updating(fn (Model $model) => $model->fillSlugs());
    }

    protected function fillSlugs(): void
    {
        $this->slug = Str::slug($this->slug);

        if (blank($this->slug) || $this->slugAlreadyUsed($this->slug)) {
            $this->slug = $this->generateSlug();
        }
    }

    public function generateSlug(): string
    {
        $base = $slug = Str::slug($this->{$this->getSlugFieldSource()});
        $suffix = 1;

        while ($this->slugAlreadyUsed($slug)) {
            $slug = Str::slug($base . '_' . $suffix++);
        }

        return $slug;
    }

    protected function slugAlreadyUsed(string $slug): bool
    {
        $query = static::query()
            ->where('slug', $slug)
            ->withoutGlobalScopes();

        if ($this->exists) {
            $query->where($this->getKeyName(), '!=', $this->getKey());
        }

        return $query->exists();
    }

    public function getUrlAttribute(): ?string
    {
        $key = $this->getMorphClass();

        if (! $this->slug) {
            return null;
        }

        return route('front.' . Str::plural($key) . '.show', [
            $key => $this->slug,
        ]);
    }
}
