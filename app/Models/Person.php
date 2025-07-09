<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Laravel\Scout\Searchable;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory;
    use HasSlug;
    use Searchable;

    public $fillable = [
        'name',
    ];

    public string $slugFieldSource = 'name';

    public function statementAssets(): HasMany
    {
        return $this->hasMany(StatementAssets::class);
    }

    public function statementInterests(): HasMany
    {
        return $this->hasMany(StatementInterests::class);
    }

    public function position(): HasOneThrough
    {
        return $this
            ->hasOneThrough(
                Position::class,
                StatementAssets::class,
                'person_id',
                'id',
                'id',
                'position_id'
            )
            ->latest('statement_assets.statement_date');
    }

    public function institution(): HasOneThrough
    {
        return $this
            ->hasOneThrough(
                Institution::class,
                StatementAssets::class,
                'person_id',
                'id',
                'id',
                'institution_id'
            )
            ->latest('statement_assets.statement_date');
    }

    public static function typesenseModelSettings(): array
    {
        return [
            'collection-schema' => [
                'fields' => [
                    [
                        'name' => 'id',
                        'type' => 'string',
                    ],
                    [
                        'name' => 'name',
                        'type' => 'string',
                    ],
                    [
                        'name' => 'institution_names',
                        'type' => 'string[]',
                    ],
                    [
                        'name' => 'institution_ids',
                        'type' => 'int32[]',
                    ],
                    [
                        'name' => 'positions',
                        'type' => 'string[]',
                    ],
                ],
            ],
            'search-parameters' => [
                'query_by' => 'name,institution_names,positions',
            ],
        ];
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => (string) $this->id,
            'name' => $this->name,

            'positions' => $this->statementAssets->pluck('position.title')
                ->merge($this->statementInterests->pluck('position.title'))
                ->unique()
                ->values()
                ->all(),

            'institution_names' => $this->statementAssets->pluck('institution.name')
                ->merge($this->statementInterests->pluck('institution.name'))
                ->unique()
                ->values()
                ->all(),

            'institution_ids' => $this->statementAssets->pluck('institution.id')
                ->merge($this->statementInterests->pluck('institution.id'))
                ->unique()
                ->values()
                ->all(),

        ];
    }

    protected function makeAllSearchableUsing(Builder $query): Builder
    {
        return $query->with([
            'statementAssets.position:id,title',
            'statementAssets.institution:id,name',
            'statementInterests.position:id,title',
            'statementInterests.institution:id,name',
        ]);
    }
}
