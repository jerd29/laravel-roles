<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermisosController extends Controller
{

public function create()
    {
    
    return view('contact-form');

    }
    
    public function store(Request $request)
    {
        $request->validate([
                 'rolname'           => 'required',
                 'permisos'          => 'required',
             ]);

            //  $data = $request->all();

             
    
            //  dd($request);
            $rol = Role::create([
                'name'          => $request['rolname'],
                'guard_name'         => 'web',
            ]);
            
            $rol->givePermissionTo([$request['permisos']]);
    
            // return response()->json([ 'success'=> 'Form is successfully submitted!']);

            return response()->json([ 
                'success'=> 'Form is successfully submitted!'
                // 'data' => $data,

                ]);

    
    }
}
