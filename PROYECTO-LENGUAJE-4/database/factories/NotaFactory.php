<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\notas;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //UN VALOR PARA AYUDAR A LOS SEEDER
            'texto'=>$this->faker->word,
            'fecha'=>$this->faker->datetime,
            'contacto_id'=>$this->faker->numberBetween(1,200),
        ];
    }
}
