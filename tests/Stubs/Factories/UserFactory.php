<?php

namespace Rumspeed\LaravelNotes\Tests\Stubs\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Rumspeed\LaravelNotes\Tests\Stubs\Models\User;

/**
 * Class     UserFactory
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
        ];
    }
}
