<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\League;
use App\Models\Tournament;

class TournamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tournament::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'league_id' => League::factory(),
            'name' => $this->faker->name,
            'public_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'short_code' => $this->faker->randomLetter,
            'sequence' => $this->faker->numberBetween(-10000, 10000),
            'promotion_zone' => $this->faker->numberBetween(-1000, 1000),
            'relegation_zone' => $this->faker->numberBetween(-1000, 1000),
            'featured_position' => $this->faker->boolean,
            'hide_ranking' => $this->faker->boolean,
            'hide_players' => $this->faker->boolean,
            'hide_field' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
        ];
    }
}
