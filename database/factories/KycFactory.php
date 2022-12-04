<?php

namespace Database\Factories;

use App\Models\Kyc;
use Illuminate\Database\Eloquent\Factories\Factory;

class KycFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kyc::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nid_name' => $this->faker->word,
            'nid_number' => $this->faker->word,
            'nid_copy' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
