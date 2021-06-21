<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showRegistrationForm() {

        $roles_admin = Role::all()->where('id', '!=', '3');
        $roles_superadmin = Role::all();


        return view('auth.register', compact('roles_admin', 'roles_superadmin'));

        // dd(Role::all());

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['required'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
        // return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // $role = Role::create(([
        //     'roles' => $data['roles']
        // ]));

        $user->assignRole($data['roles']);

        return $user;





    }

              // Update record
          public function updateUser(Request $request){

            $userid = $request->input('iduser');
            $name = $request->input('nameuser');
            $email = $request->input('email');
            // $idrol = $request->input('idrol');
            // $rolname = $request->input('rolname');


            
            $user = User::findById($userid);
    
            // dd($idrol);
            // $email = $request->input('email');
    
            if($name !=''){
                $data = array(
                    'name'=>$name
                    // 'idrol'=>$editid
                );
    
            // // Call updateData() method of Page Model
    
            User::where('id', $userid)->update(['name'=> $name, 'email'=> $email]);
            // $role->syncPermissions($request->get('permisos'));
    
    
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
