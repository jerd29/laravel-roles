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

        $roles = Role::all();
        return view('rolesPermisos.roles', compact('roles'));
        // return dd(Role::all());
        
    }

    public function showpermisos() {

        $permisos = Permission::all();
        return view('rolesPermisos.permisos', compact('permisos'));
        // return dd(Role::all());
        
    }
}
