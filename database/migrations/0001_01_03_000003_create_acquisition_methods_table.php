<?php

declare(strict_types=1);

use App\Models\AcquisitionMethod;
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
        Schema::create('acquisition_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        AcquisitionMethod::insert(
            collect(Storage::disk('seed-data')->json('acquisition-methods.json'))
                ->map(fn (string $name) => [
                    'name' => $name,
                ])
                ->all()
        );
    }
};
