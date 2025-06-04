<?php

declare(strict_types=1);

use App\Models\Country;
use App\Models\County;
use App\Models\Locality;
use App\Models\Person;
use App\Models\Position;
use Filament\Support\Assets\Asset;
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
            $table->foreignIdFor(Person::class)->constrained();
            $table->foreignIdFor(Position::class)->constrained();

            $table->date('statement_date');

            $table->timestamps();
        });
    }
};
