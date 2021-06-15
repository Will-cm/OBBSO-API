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
    //'middleware' => 'api',
    //'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('register', [AuthController::class, 'register']);

});

Route::group([
    'middleware' => 'auth',
    'namespace' => 'App\Http\Controllers', 
    //'prefix' => 'auth'   
  ], function($router) {
      //Route::resource('role', 'RoleController');
      //Route::get('role', 'RoleController@index')->name('role.index');
      Route::post('role', 'RoleController@store')->name('role.store');
      //Route::get('role/{role}', 'RoleController@show')->name('role.show');
      Route::put('role/{role}', 'RoleController@update')->name('role.update');
      Route::delete('role/{role}', 'RoleController@destroy')->name('role.destroy');

      //Route::resource('persona', 'PersonaController');
      Route::get('persona', 'PersonaController@index')->name('persona.index');
      Route::post('persona', 'PersonaController@store')->name('persona.store');      
      Route::put('persona/{persona}', 'PersonaController@update')->name('persona.update');
      Route::delete('persona/{persona}', 'PersonaController@destroy')->name('persona.destroy');

      Route::get('rol_user', 'Rol_userController@index')->name('rol_user.index');
      Route::post('rol_user', 'Rol_userController@store')->name('rol_user.store');      
      Route::put('rol_user/{rol_user}', 'Rol_userController@update')->name('rol_user.update');
      Route::delete('rol_user/{rol_user}', 'Rol_userController@destroy')->name('rol_user.destroy');

      Route::get('modulo', 'ModuloController@index')->name('modulo.index');

      Route::get('permiso', 'PermisoController@index')->name('permiso.index');
  }

  /////nuevo
);

Route::get('role', 'App\Http\Controllers\RoleController@index')->name('role.index');


