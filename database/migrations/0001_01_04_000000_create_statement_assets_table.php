<?php

declare(strict_types=1);

use App\Models\Institution;
use App\Models\Person;
use App\Models\Position;
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
        Schema::create('statement_assets', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Person::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(Position::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(Institution::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->date('statement_date');

            $table->timestamps();
        });
    }
};
