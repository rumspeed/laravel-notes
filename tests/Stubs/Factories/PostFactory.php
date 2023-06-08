<?php

namespace Rumspeed\LaravelNotes\Tests\Stubs\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Rumspeed\LaravelNotes\Tests\Stubs\Models\Post;

/**
 * Class     PostFactory
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title'   => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(5, true),
        ];
    }
}
