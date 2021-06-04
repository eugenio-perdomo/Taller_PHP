<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Editor;
use App\Models\Normal;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Usuario::create([
            'username' => 'pablo.suarez',
            'nombre' => 'Pablo',
            'apellido' => 'Suárez',
            'fNacimiento' => '1996-02-15',
            'email' => 'pablo.suarez.urrutia@gmail.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('Admin');
        Administrador::create([
            'administrador_id' => $user->id,
            'confirmado' => true,
        ]);

        /*$role->revokePermissionTo($permission); opciones para revocar permisos
        $permission->removeRole($role);*/
    }
}
