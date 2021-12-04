<?php

namespace Database\Factories;

use App\Models\Agape;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgapeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agape::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_ibadah' => $this->faker->word,
        'tanggal_ibadah' => $this->faker->word,
        'jam_ibadah' => $this->faker->word,
        'kuota' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
