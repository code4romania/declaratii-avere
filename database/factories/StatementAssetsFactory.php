<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\StatementType;
use App\Models\Institution;
use App\Models\Person;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StatementAssets>
 */
class StatementAssetsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(StatementType::values()),
            'statement_date' => fake()->dateTimeBetween('-10 years', 'now'),
            'person_id' => Person::factory(),
            'position_id' => Position::factory(),
            'institution_id' => Institution::factory(),
            'filename' => \sprintf('assets/%s.pdf', fake()->uuid()),
        ];
    }
}
