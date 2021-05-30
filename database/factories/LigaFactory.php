<?php

namespace Database\Factories;

use App\Models\Liga;
use Illuminate\Database\Eloquent\Factories\Factory;

class LigaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Liga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nombreLiga"=>$this->faker->word(),
            "participantes"=>$this->faker->randomDigitNotNull(),
            "sistemaDeJuego"=>$this->faker->randomElements(["Solo_Ida","Ida_y_Vuelta","Grupos_y_Eliminatoria","Eliminatoria"])
        ];
    }
}
