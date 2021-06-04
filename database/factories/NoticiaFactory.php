<?php

namespace Database\Factories;

use App\Models\Noticia;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "tituloNoticia"=>$this->faker->word(20),
            'copeteNoticia' => $this->faker->word(50),
            'cuerpoNoticia' => $this->faker->word(500),
            'cantVisual' => $this->faker->numberBetween($min = 10, $max = 1000),
            'tipoNoticia' => $this->faker->randomElement(['Analisis', 'DatoColor','Fichaje','Información']),
            'id_creador' => '1',
        ];
    }
}
