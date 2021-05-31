<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Liga;
use Illuminate\Database\Seeder;

class LigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ligas = Liga::factory(10)->create();
        foreach($ligas as $liga){
            $liga->roles()
            ->attach([Equipo::all()->random()->id, Liga::all()->random()->id]);
        }
        
    }
}
