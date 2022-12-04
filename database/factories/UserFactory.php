<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->word,
            'last_name' => $this->faker->word,
            'email' => $this->faker->word,
            'phone' => $this->faker->word,
            'Avatar' => $this->faker->word,
            'address' => $this->faker->word,
            'city' => $this->faker->word,
            'state' => $this->faker->word,
            'zip' => $this->faker->word,
            'country' => $this->faker->word,
            'status' => $this->faker->word,
            '2fa' => $this->faker->word,
            'password' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
