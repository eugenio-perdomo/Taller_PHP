<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => "Admin"]); //Creo roles
        $role2 = Role::create(['name' => "Editor"]);
        $role3 = Role::create(['name' => "Normal"]);

        Permission::create(['name' => 'jugadores.create'])->assignRole($role1); //Creo y asigno permisos a un rol en particular
        Permission::create(['name' => 'jugadores.index'])->syncRoles([$role1, $role2, $role3]); //Creo permisos y se lo asigno a varios usuarios
        Permission::create(['name' => 'jugadores.edit'])->assignRole($role1);
        Permission::create(['name' => 'jugadores.destroy'])->assignRole($role1);

        Permission::create(['name' => 'roles.index'])->syncRoles($role1);
        Permission::create(['name' => 'roles.update'])->assignRole($role1);
        Permission::create(['name' => 'roles.destroy'])->assignRole($role1);

        /*$role->revokePermissionTo($permission); opciones para revocar permisos
        $permission->removeRole($role);*/
    }
}
