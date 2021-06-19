<?php

namespace App\Http\Controllers;

use Illuminate\Auth\EloquentUserProvider;
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

    public function destroy($id){
   
        Role::find($id)->delete($id);
      
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

      // Update record
    public function updateRol(Request $request){

        $name = $request->input('namerol');
        $editid = $request->input('idrol');
        
        $role = Role::findById($editid);

        // dd($idrol);
        // $email = $request->input('email');

        if($name !=''){
            $data = array(
                'rolname'=>$name
                // 'idrol'=>$editid
            );

        // // Call updateData() method of Page Model

        Role::where('id', $editid)->update(['name'=> $name]);
        $role->syncPermissions($request->get('permisos'));


        // Role::updateData($editid, $data);

        return response()->json([ 
            'success'=> 'Form is successfully submitted!'
            // 'data' => $data,

            ]);
        }else{
        echo 'Fill all fields.';
        }

        exit; 
    }
    
}
