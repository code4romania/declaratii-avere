<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Mail::fake();

        User::factory(['email' => 'admin@example.com'])
            ->admin()
            ->create();

        User::factory(['email' => 'validator@example.com'])
            ->validator()
            ->create();

        User::factory(['email' => 'contributor@example.com'])
            ->contributor()
            ->create();

        User::factory(['email' => 'viewer@example.com'])
            ->viewer()
            ->create();

        Person::factory(50)
            ->create();
    }
}
