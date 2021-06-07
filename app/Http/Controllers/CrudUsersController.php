<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CrudUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $usuarios = User::all();
        // dd($usuarios[0]->getAllPermissions()->pluck('name')->join(','));
        return view('crudUser.index', compact('usuarios'));
        // dd($roles);
    }
}
