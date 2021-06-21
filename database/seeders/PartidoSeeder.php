<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Partido;
use App\Models\Jugador;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partidos = Partido::factory(250)->create();
        foreach ($partidos as $partido) {
            $numero = rand(30, 70);
            if ($partido->estadoPartido == 'Finalizado') {
                $tirosTotales = rand(0, 20);
                $golesL = rand(0, 5);
                $amarillasL = rand(0, 6);
                $rojasL = rand(0, 2);
                $partido->rolesequipos()->attach(Equipo::all()->random()->id, [
                    "goles" => $golesL,
                    "posesion" => $numero,
                    "tirosTotales" => $tirosTotales,
                    "tirosPuerta" => rand(0, $tirosTotales),
                    "corner" => rand(0, 12),
                    "offside" => rand(0, 4),
                    "faltas" => rand(0, 25),
                    "amarillas" => $amarillasL,
                    "rojas" => $rojasL,
                    "estado" => "Local"
                ]);
                $tirosTotales = rand(0, 20);
                $golesV = rand(0, 5);
                $amarillasV = rand(0, 6);
                $rojasV = rand(0, 2);
                $partido->rolesequipos()->attach(Equipo::all()->random()->id, [
                    "goles" => $golesV,
                    "posesion" => 100 - $numero,
                    "tirosTotales" => $tirosTotales,
                    "tirosPuerta" => rand(0, $tirosTotales),
                    "corner" => rand(0, 12),
                    "offside" => rand(0, 4),
                    "faltas" => rand(0, 25),
                    "amarillas" => $amarillasV,
                    "rojas" => $rojasV,
                    "estado" => "Visitante"
                ]);
                for ($i = 0; $i < $golesL; $i++) {

                    $partido->rolesjugadores()->attach(
                        Jugador::all()->random()->id,
                        [
                            "accion" => Arr::random(["Gol", "Gol en contra"]),
                            "minuto" => rand(0, 95)
                        ]
                    );
                }
                for ($i = 0; $i < $golesV; $i++) {

                    $partido->rolesjugadores()->attach(
                        Jugador::all()->random()->id,
                        [
                            "accion" => Arr::random(["Gol", "Gol en contra"]),
                            "minuto" => rand(0, 95)
                        ]
                    );
                }
                for ($i=0; $i < $amarillasL; $i++) { 
                    $partido->rolesjugadores()->attach(
                        Jugador::all()->random()->id,
                        [
                            "accion" => "Amarilla",
                            "minuto" => rand(0, 95)
                        ]
                    );
                }
                for ($i=0; $i < $amarillasV; $i++) { 
                    $partido->rolesjugadores()->attach(
                        Jugador::all()->random()->id,
                        [
                            "accion" => "Amarilla",
                            "minuto" => rand(0, 95)
                        ]
                    );
                }
                for ($i=0; $i < $rojasL; $i++) { 
                    $partido->rolesjugadores()->attach(
                        Jugador::all()->random()->id,
                        [
                            "accion" => "Roja",
                            "minuto" => rand(0, 95)
                        ]
                    );
                }
                for ($i=0; $i < $rojasV; $i++) { 
                    $partido->rolesjugadores()->attach(
                        Jugador::all()->random()->id,
                        [
                            "accion" => "Roja",
                            "minuto" => rand(0, 95)
                        ]
                    );
                }
            } else {
                $partido->rolesequipos()->attach(Equipo::all()->random()->id, [
                    "estado" => "Local"
                ]);

                $partido->rolesequipos()->attach(Equipo::all()->random()->id, [
                    "estado" => "Visitante"
                ]);
            }
        }
    }
}
