<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();    
        return response()->json($user);
    }

    ///////////////create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User(request()->all());
        $user->password = bcrypt($user->password);
        $user->save();

        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);    
        return response()->json($user);
    }

    //////////////edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   /*
        //MODIFICAR MI PERFIL
        $user = Auth()->user();
        $password = bcrypt($request->password);
        $user->username = ($request->username);
        $user->password = $password;
        $user->save();
        return response()->json(['ok'=>true, 'mensaje'=> 'Se modifico con exito']); 
        */ 
        //MODIFICAR CUALQUIER USUARIO POR SU ID
        $user = User::find($id);
        $user->username = ($request->username);
        $user->password = bcrypt($request->password);
        $user->save();
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
        $user =User::where('id',$id);
        $user->delete();
        return response()->json(['ok'=>true, 'mensaje'=> 'Se elimino con exito']);
    }
}
