<?php

declare(strict_types=1);

use App\Models\AcquisitionMethod;
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
        Schema::create('statement_assets_vehicles', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(StatementAssets::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('category');
            $table->string('brand');
            $table->smallInteger('quantity')->unsigned();
            $table->year('year');

            $table->foreignIdFor(AcquisitionMethod::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }
};
