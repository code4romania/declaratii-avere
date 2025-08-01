<?php

declare(strict_types=1);

use App\Enums\AreaUnitMeasure;
use App\Models\AcquisitionMethod;
use App\Models\Country;
use App\Models\County;
use App\Models\Locality;
use App\Models\StatementAssets;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statement_assets_buildings', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(StatementAssets::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(Country::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(County::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(Locality::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('foreign_locality')->nullable();

            $table->foreignIdFor(AcquisitionMethod::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('category');
            $table->year('year');

            $table->float('area');
            $table->string('area_unit');
            $table->float('area_m2')
                ->nullable()
                ->virtualAs(sprintf(
                    <<<'SQL'
                        CASE
                            WHEN area_unit = '%s' THEN area
                            WHEN area_unit = '%s' THEN area * 100
                            WHEN area_unit = '%s' THEN area * 10000
                            ELSE 0
                        END
                    SQL,
                    AreaUnitMeasure::SQUARE_METER->value,
                    AreaUnitMeasure::ARES->value,
                    AreaUnitMeasure::HECTARES->value
                ));

            $table->string('share_type');
            $table->string('share');

            $table->json('owners');

            $table->timestamps();
        });
    }
};
