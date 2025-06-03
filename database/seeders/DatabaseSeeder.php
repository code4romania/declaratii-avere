<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Institution;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(['email' => 'admin@example.com'])
            ->create();

        Person::factory(50)
            ->create();

        Institution::factory(10)
            ->hasPositions(5)
            ->create();
    }
}
