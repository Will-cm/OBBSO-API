<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Role;    ///
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
        /*
        $modulo = Modulo::all();
        return response()->json($modulo->toArray()); */
        
        $role = Role::join("rol_users","rol_users.rol_id","=","roles.id")
            ->where('rol_users.user_id','=',auth()->user()->id)  //1 // auth()->user()
            ->get();  // para obtener en forma de cadena  ->toSql();
           
        $modulo = Modulo::whereIn('id', [1,2,3])
            ->get();
        return response()->json($modulo); 

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
        $input = $request->all();
        $modulo = Modulo::find($id);
        $modulo->update($input);
        return response()->json(['ok'=>true, 'mensaje'=> 'Se modifico con exito']);
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
