<?php
use App\Http\Controllers\AuthController;  /////
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});  */

Route::group([
    'middleware' => 'api',
    //'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('profile', [AuthController::class, 'profile']);
    //Route::post('register', [AuthController::class, 'register']);  //

});

Route::group([
    'middleware' => 'auth',
    'namespace' => 'App\Http\Controllers', 
    //'prefix' => 'auth'   
  ], function($router) {
      //Route::resource('role', 'RoleController');
      /*
      Route::get('role', 'RoleController@index')->name('role.index');
      Route::post('role', 'RoleController@store')->name('role.store');
      //Route::get('role/{role}', 'RoleController@show')->name('role.show');
      Route::put('role/{role}', 'RoleController@update')->name('role.update');
      Route::delete('role/{role}', 'RoleController@destroy')->name('role.destroy');   */

      //Route::resource('persona', 'PersonaController');
      Route::get('persona', 'PersonaController@index')->name('persona.index');
      Route::post('persona', 'PersonaController@store')->name('persona.store');      
      Route::put('persona/{persona}', 'PersonaController@update')->name('persona.update');
      //Route::delete('persona/{persona}', 'PersonaController@destroy')->name('persona.destroy');

      Route::get('usuario', 'UserController@index')->name('usuario.index');
      Route::post('usuario', 'UserController@store')->name('usuario.store');
      //Route::get('user/{user}', 'UserController@show')->name('user.show');      
      //Route::put('user/{user}', 'UserController@update')->name('user.update');  //
      //Route::delete('user/{user}', 'UserController@destroy')->name('user.destroy');

      Route::get('empleado', 'EmpleadoController@index')->name('empleado.index');
      Route::post('empleado', 'EmpleadoController@store')->name('empleado.store');
      //Route::get('empleado/{empleado}', 'EmpleadoController@show')->name('empleado.show');      
      //Route::put('empleado/{empleado}', 'EmpleadoController@update')->name('empleado.update');  //
      //Route::delete('empleado/{empleado}', 'EmpleadoController@destroy')->name('empleado.destroy');
/*
      Route::get('rol_user', 'Rol_UserController@index')->name('rol_user.index');
      Route::post('rol_user', 'Rol_UserController@store')->name('rol_user.store');      
      Route::put('rol_user/{rol_user}', 'Rol_UserController@update')->name('rol_user.update');
      Route::delete('rol_user/{rol_user}', 'Rol_UserController@destroy')->name('rol_user.destroy');  */

    ///permiso = modulo
    //Route::get('modulo', 'ModuloController@index')->name('modulo.index');
      Route::get('permiso', 'ModuloController@index')->name('permiso.index');
      Route::get('permiso/{permiso}', 'ModuloController@lista')->name('permiso.lista');
      //Route::post('permiso', 'ModuloController@store')->name('permiso.store');
      //Route::get('permiso/{permiso}', 'ModuloController@show')->name('permiso.show');
      Route::put('permiso/{permiso}', 'ModuloController@update')->name('permiso.update');
      //Route::delete('permiso/{permiso}', 'ModuloController@destroy')->name('permiso.destroy');
/*
      //TABLA INTERMEDIA PERMISOS = CAPACIDAD
      //Route::get('permiso', 'PermisoController@index')->name('permiso.index');
      Route::get('capacidad', 'PermisoController@index')->name('capacidad.index');
      Route::post('capacidad', 'PermisoController@store')->name('capacidad.store');
      Route::get('capacidad/{capacidad}', 'PermisoController@show')->name('capacidad.show');
      Route::put('capacidad/{capacidad}', 'PermisoController@update')->name('capacidad.update');
      Route::delete('capacidad/{capacidad}', 'PermisoController@destroy')->name('capacidad.destroy');  */
  }

  /////nuevo
);


