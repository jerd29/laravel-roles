<?php

namespace App\Http\Controllers;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function showroles() {

        $roles_superadmin = Role::all();
        $roles_admin = Role::all()->where('id', '!=', '3');
        $permisos = Permission::all();
        return view('rolesPermisos.roles', compact('roles_admin' , 'permisos', 'roles_superadmin'));
        
        // return dd(Role::all());
        
    }

    public function showpermisos() {

        $permisos = Permission::orderBy('id', 'ASC')->paginate(10);
        return view('rolesPermisos.permisos', compact('permisos'));
        // return dd(Role::all());
        
    }
}
