<?php

declare(strict_types=1);

use App\Models\Country;
use App\Models\County;
use App\Models\Locality;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $country = Country::create([
            'name' => 'Romania',
        ]);

        Schema::create('counties', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Country::class)->constrained()->cascadeOnDelete();
            $table->string('code', 2)->unique();
            $table->string('name');
        });

        Schema::create('localities', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(County::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->tinyInteger('level')->unsigned();

            $table->tinyInteger('type')->unsigned();

            $table->foreignIdFor(Locality::class, 'parent_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('name');
        });

        Schema::withoutForeignKeyConstraints(function () {
            DB::unprepared(
                Storage::disk('seed-data')->get('siruta.sql')
            );
        });

        DB::table('counties')->update(['country_id' => $country->id]);
    }
};
