<?php

declare(strict_types=1);

use App\Models\Position;
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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();

            $table->string('title');
        });

        Position::insert(
            collect(Storage::disk('seed-data')->json('positions.json'))
                ->map(fn (string $title) => [
                    'title' => $title,
                ])
                ->all()
        );
    }
};
