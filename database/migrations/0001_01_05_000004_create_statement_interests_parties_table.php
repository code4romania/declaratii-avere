<?php

declare(strict_types=1);

use App\Models\StatementInterests;
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
        Schema::create('statement_interests_parties', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(StatementInterests::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');

            $table->timestamps();
        });
    }
};
