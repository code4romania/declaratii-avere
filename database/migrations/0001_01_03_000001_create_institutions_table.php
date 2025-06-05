<?php

declare(strict_types=1);

use App\Models\Institution;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

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
        });

        Institution::insert(
            collect(Storage::disk('seed-data')->json('institutions.json'))
                ->map(fn (string $name) => [
                    'name' => $name,
                ])
                ->all()
        );
    }
};
