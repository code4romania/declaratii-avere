<?php

declare(strict_types=1);

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
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(StatementAssets::class);
            $table->foreignIdFor(Country::class)->constrained();
            $table->foreignIdFor(County::class)->constrained();
            $table->foreignIdFor(Locality::class)->constrained();
            $table->string('category');
            $table->string('acquisition_method');
            $table->year('year');
            $table->float('area', 10, 2)->comment('area in square meters');
            $table->float('ownership_percentage', 5, 2)->default(100.00)->comment('percentage of ownership in the plot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plots');
    }
};
