<?php

use App\Http\Controllers\CrudUsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['permission:crear roles|editar roles|eliminar roles']], function () {

        Route::get('/roles', 'Controller@showroles')->name('showroles');

        Route::post('rolform', 'RolesPermisosController@store');

        Route::delete('roles/{id}', 'RolesPermisosController@destroy')->name('roles.destroy');

        Route::post('updateRol', 'RolesPermisosController@updateRol')->name('roles.update');

        Route::post('updateUser', 'CrudUsersController@updateUser')->name('user.update');


    });

Route::group(['middleware' => ['permission:crear usuarios|editar usuarios|eliminar usuarios']], function () {

    Route::get('/usuarios', 'CrudUsersController@index')->name('crudUser');

});


Route::group(['middleware' => ['role:super-admin']], function () {

    // Route::get('rol-form', 'RolesPermisosController@create');
    Route::post('rol-form', 'RolesPermisosController@store');

    Route::get('/permisos', 'Controller@showpermisos')->name('showpermisos');

});




// Route::get('/create', function() {
//     //  Role::create(['name' => 'escritor']);
//     // Permission::create(['name' => 'editar articulos']); 


// });

// Route::get('/show', function() {
// /*     dd(Role::all(),Permission::all()); */   

//     Role::findById(2)->givePermissionTo(Permission::first());
// });


