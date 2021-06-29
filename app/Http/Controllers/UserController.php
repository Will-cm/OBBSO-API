<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Modulo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

///
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
//        $user = User::all();
        $user = DB::table('users')
            ->join('personas', 'personas.id_persona', '=', 'users.persona_id')
            ->select('users.username', 'personas.nombres', 'personas.imagen')
            ->get();
        return response()->json($user);
    }

    ///////////////create

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        /*
          $user = new User(request()->all());
          $user->password = bcrypt($user->password);
          $user->save();
          return response()->json(['message' => 'User created successfully', 'user' => $user]);  */
        // LLENAR LA TABLA PERMISOS
        $user = new User(request()->all());
        $user->password = bcrypt($user->password);
        $modulo = Modulo::get();
        $cantidad = $modulo->count();
        $num = 1;
        if ($user->save()) {
            while ($num <= $cantidad) {
                DB::table('permisos')->insert([
                    'id_user' => $user->id_user,
                    'id_modulo' => $num,
                ]);
                $num = $num + 1;
            }
        }
        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
//        $user = User::find($id);
        $user = DB::table('users')
            ->select('personas.nombres', 'personas.imagen')
            ->where('users.id_user', '=', $id)
            ->get();
        return response()->json($user[0]);
    }

    //////////////edit

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
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
        return response()->json(['ok' => true, 'mensaje' => 'Se modifico con exito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id);
        $user->delete();
        return response()->json(['ok' => true, 'mensaje' => 'Se elimino con exito']);
    }
}
