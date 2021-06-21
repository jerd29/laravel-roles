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
}
