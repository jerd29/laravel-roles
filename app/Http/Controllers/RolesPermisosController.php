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

    public function destroy($id){
   
        Role::find($id)->delete($id);
      
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

      // Update record
    public function update(Request $request){

        $name = $request->input('name');
        $email = $request->input('email');
        $editid = $request->input('editid');

        if($name !='' && $email != ''){
        $data = array('name'=>$name,"email"=>$email);

        // Call updateData() method of Page Model
        Role::updateData($editid, $data);
        echo 'Update successfully.';
        }else{
        echo 'Fill all fields.';
        }

        exit; 
    }
}
