<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
//use App\Models\Role;    ///
use App\Models\Permiso;    ///
//use App\Models\Rol_user;    ///
use Illuminate\Support\Facades\DB; ///
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $modulo = Modulo::all();
        return response()->json($modulo->toArray());
        /*
        $role = Role::join("rol_users","rol_users.rol_id","=","roles.id")
            ->where('rol_users.user_id','=',auth()->user()->id)  //1 // auth()->user()
            ->get();  // para obtener en forma de cadena  ->toSql();

        $modulo = Modulo::whereIn('id', [1,2,3])
            ->get();
        return response()->json($modulo); */
        /*
        $modulo = Role::join("permisos","permisos.rol_id","=","roles.id")
            ->join("modulos","modulos.id","=","permisos.modulo_id")
            ->select("modulos.id","modulos.titulo")
            //->addSelect(['id_ru' => Rol_user::select('rol_users.rol_id')
                  //->whereColumn('rol_users.rol_id', 'roles.id')
                  //->where('rol_users.user_id','=',2)])
            //->whereIn('roles.id','=',1)  //1 // auth()->user()
            ->whereRaw('roles.id in (select rol_users.rol_id from rol_users where rol_users.rol_id=2)')

            ->get();  // para obtener en forma de cadena  ->toSql();  */
    //LISTAR MODULOS SEGUN ROL Y PERMISOS
    /*
          $modulo = Role::join("permisos","permisos.rol_id","=","roles.id")
          ->join("modulos","modulos.id","=","permisos.modulo_id")
          ->select("modulos.id","modulos.titulo")
          ->whereIn('roles.id', function($query)
          {
            $query->select(DB::raw('rol_users.rol_id'))
                  ->from('rol_users')
                  ->where('rol_users.rol_id','=',auth()->user()->id);  //1 or 2
          })
          ->get();  // para obtener en forma de cadena  ->toSql();
        return response()->json($modulo->toArray());
      */

    }
    //nuevo
    public function lista($id){
      $modulo = Modulo::join("permisos","permisos.id_modulo","=","modulos.id_modulo")
                ->where('permisos.id_user','=',$id)  //1 // auth()->user()
                ->where('permisos.estado','=',1)
                ->select("modulos.id_modulo","modulos.modulo", "modulos.vicon")
                ->get();
      return response()->json($modulo->toArray());
    }

    ////////////////////////create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modulo = new Modulo($request->all());
        $modulo->save();
        return response()->json(['message' => 'User created successfully', 'rol' => $modulo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modulo = Modulo::find($id);
        return response()->json($modulo);
    }

    ////////////////////////////edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      /*
        $input = $request->all();
        $modulo = Modulo::find($id);
        $modulo->update($input);
        return response()->json(['ok'=>true, 'mensaje'=> 'Se modifico con exito']);  */

        $permiso = Permiso::where('id_user','=',$id)
                    ->where('id_modulo','=',$request->id_modulo)
                    ->first();  //get()  //para mostrar con corchetes
        $permiso->estado = $request->estado;
        $permiso->save();
        return response()->json($permiso);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modulo =Modulo::where('id',$id);
        $modulo->delete();
        return response()->json(['ok'=>true, 'mensaje'=> 'Se elimino con exito']);
    }
}
