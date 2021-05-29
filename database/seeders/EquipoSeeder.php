<?php

namespace Database\Seeders;

use App\Models\Equipo as ModelsEquipo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsEquipo::factory()->count(10)->hasJugadors(20)->create();
    }
}
