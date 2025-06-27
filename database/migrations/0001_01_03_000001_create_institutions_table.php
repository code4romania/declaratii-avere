<?php

declare(strict_types=1);

use App\Models\Institution;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Institution::insert(
            collect(Storage::disk('seed-data')->json('institutions.json'))
                ->map(fn (string $name) => [
                    'name' => $name,
                    'slug' => Str::slug($name),
                ])
                ->unique('slug')
                ->all()
        );
    }
};
