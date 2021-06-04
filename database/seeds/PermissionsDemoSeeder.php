<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create 
        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'editar usuarios']);
        Permission::create(['name' => 'eliminar usuarios']);

        Permission::create(['name' => 'crear roles']);
        Permission::create(['name' => 'editar roles']);
        Permission::create(['name' => 'eliminar roles']);

        Permission::create(['name' => 'crear permisos']);
        Permission::create(['name' => 'editar permisos']);
        Permission::create(['name' => 'eliminar permisos']);

        Permission::create(['name' => 'ver articulos']);
        Permission::create(['name' => 'crear articulos']);
        Permission::create(['name' => 'editar articulos']);
        Permission::create(['name' => 'eliminar articulos']);


        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'usuario']);
        $role1->givePermissionTo('crear articulos');
        $role1->givePermissionTo('editar articulos');
        $role1->givePermissionTo('eliminar articulos');


        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('crear usuarios');
        $role2->givePermissionTo('editar usuarios');
        $role2->givePermissionTo('eliminar usuarios');
        $role2->givePermissionTo('crear articulos');
        $role2->givePermissionTo('editar articulos');
        $role2->givePermissionTo('eliminar articulos');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = factory(User::class)->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role1);

        $user = factory(User::class)->create([
            'name' => 'adminuser',
            'email' => 'admin@example.com',
        ]);
        
        $user->assignRole($role2);

        $user = factory(User::class)->create([
            'name' => 'superadmin',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);

        $user = factory(User::class)->create([
            'name' => 'Administrador Nacional',
            'email' => 'administrador',
        ]);
        $user->assignRole($role2);

    }
}