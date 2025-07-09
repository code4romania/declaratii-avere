<?php

declare(strict_types=1);

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
        Schema::table('statement_assets', function (Blueprint $table) {
            $table->string('party')->nullable()->after('person_id');
        });

        Schema::table('statement_interests', function (Blueprint $table) {
            $table->string('party')->nullable()->after('person_id');
        });
    }
};
