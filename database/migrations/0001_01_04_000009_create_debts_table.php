<?php

declare(strict_types=1);

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
        Schema::create('statement_assets_debts', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(StatementAssets::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('creditor');
            $table->year('year_incurred')->nullable();
            $table->year('year_due')->nullable();

            $table->unsignedBigInteger('value');
            $table->string('currency', 3);
            $table->index(['currency', 'value']);

            $table->timestamps();
        });
    }
};
