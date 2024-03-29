<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permiso = Permiso::all();   
        return response()->json($permiso->toArray());
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
        $permiso = new Permiso($request->all());
        $permiso->save();
        return response()->json(['message' => 'User created successfully', 'rol' => $permiso]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permiso = Permiso::find($id);
        return response()->json($permiso);
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
        $permiso = Permiso::find($id);
        $permiso->update($input);
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
        $permiso =Permiso::where('id',$id);
        $permiso->delete();
        return response()->json(['ok'=>true, 'mensaje'=> 'Se elimino con exito']);
    }
}
