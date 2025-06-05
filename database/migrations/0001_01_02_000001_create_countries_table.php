<?php

declare(strict_types=1);

use App\Imports\CountriesImport;
use App\Models\Country;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

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

        // Excel::import(new CountriesImport, 'countries.csv', 'seed-data');
    }
};
