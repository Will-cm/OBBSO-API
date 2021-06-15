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
    {
      /*
        $input = $request->all();
        $user = User::find($id);
        $user->password = bcrypt($input->password);
        $user->update($input);
        return response()->json(['ok'=>true, 'mensaje'=> 'Se modifico con exito']);  */
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
