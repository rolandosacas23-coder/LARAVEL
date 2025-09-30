<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\evento;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
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
            'titulo'=>$this->faker->word,
            'descripcion'=>$this->faker->text,
            'fecha_inicio'=>$this->faker->datetime,
            'fecha_fin'=>$this->faker->datetime,
            'contacto_id'=>$this->faker->NumberBetween(1,200),

        ];
    }
}
