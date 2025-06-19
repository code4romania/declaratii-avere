<?php

declare(strict_types=1);

use App\Models\Institution;
use App\Models\Person;
use App\Models\Position;
use App\Models\User;
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
        Schema::create('statement_interests', function (Blueprint $table) {
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

            $table->string('filename');

            $table->string('type');

            $table->date('statement_date');

            $table->foreignIdFor(User::class, 'author_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignIdFor(User::class, 'validator_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->timestamps();
        });
    }
};
