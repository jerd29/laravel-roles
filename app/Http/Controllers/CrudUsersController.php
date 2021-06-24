<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class CrudUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $roles_admin = Role::all()->where('id', '!=', '3');
        $roles_superadmin = Role::all();

        $usuarios_superadmin = User::all();
        $usuarios_admin = User::notRole('3')->get();
        // $usuarios_superadmin = User::with('role')->get();
        // dd($usuarios[0]->getAllPermissions()->pluck('name')->join(','));
        return view('crudUser.index', compact('usuarios_admin', 'usuarios_superadmin', 'roles_admin', 'roles_superadmin'));
        // dd($roles);
    }

                  // Update record
                  public function updateUser(Request $request){

                    $userid = $request->input('iduser');
                    $name = $request->input('nameuser');
                    $email = $request->input('email');
                    $idrol = $request->input('roles');
                    // $rolname = $request->input('rolname');
        
        
                    
                    $user = User::where('id', $userid)->first();;
                    // $role->syncPermissions($request->get('permisos'));



                    
            
                    // dd($idrol);
                    // $email = $request->input('email');
            
                    if($name !=''){
                        $data = array(
                            'name'=>$name
                            // 'idrol'=>$editid
                        );
            
                    // // Call updateData() method of Page Model
            
                    User::where('id', $userid)->update(['name'=> $name, 'email'=> $email]);
                    $user->syncRoles($idrol);
            
            
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
