<?php

namespace Database\Factories;

use App\Models\HomeTestimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeTestimonialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HomeTestimonial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'image' => $this->faker->word,
            'name' => $this->faker->word,
            'content' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
