<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Institution;
use App\Models\Person;
use App\Models\Position;
use App\Models\StatementAssets;
use App\Models\StatementInterests;
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

        $admin = User::factory(['email' => 'admin@example.com'])
            ->admin()
            ->create();

        $validator = User::factory(['email' => 'validator@example.com'])
            ->validator()
            ->create();

        $contributor = User::factory(['email' => 'contributor@example.com'])
            ->contributor()
            ->create();

        $viewer = User::factory(['email' => 'viewer@example.com'])
            ->viewer()
            ->create();

        $positions = Position::query()
            ->inRandomOrder()
            ->take(50)
            ->get();

        $institutions = Institution::query()
            ->inRandomOrder()
            ->take(50)
            ->get();

        Person::factory(50)
            ->create()
            ->each(function (Person $person) use ($positions, $institutions, $contributor, $validator) {
                StatementAssets::factory(5)
                    ->for($person)
                    ->for($positions->random())
                    ->for($institutions->random())
                    ->for($contributor, 'author')
                    ->create();

                StatementInterests::factory(10)
                    ->for($person)
                    ->for($positions->random())
                    ->for($institutions->random())
                    ->for($contributor, 'author')
                    ->create();

                StatementAssets::factory(5)
                    ->for($person)
                    ->for($positions->random())
                    ->for($institutions->random())
                    ->for($contributor, 'author')
                    ->for($validator, 'validator')
                    ->create();

                StatementInterests::factory(10)
                    ->for($person)
                    ->for($positions->random())
                    ->for($institutions->random())
                    ->for($contributor, 'author')
                    ->for($validator, 'validator')
                    ->create();
            });
    }
}
