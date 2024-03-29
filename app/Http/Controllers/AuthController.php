<?php

namespace App\Http\Controllers;

use App\Models\User;

//////
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Facades\Auth;  //
//use App\Http\Controllers\Controller;  //
//use Symfony\Component\HttpFoundation\Response;  //

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);   //, 'register'
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['username', 'password']);
        $user = DB::table('users')
            ->select('users.id_user')
            ->where('users.username', '=', $credentials['username'])
            ->get();
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Input incorrect'], 404);  //401
        }

        return $this->respondWithToken($token, $user);
        /*
        $clientes = User::all();
      return response()->json($clientes);  */
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response()->json(auth()->user());
    }

    /////////////////
    /*
    public function register(){
      $user = new User(request()->all());
      $user->password = bcrypt($user->password);
      $user->save();

      return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }    */

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    /**  /////////////////////////////////////
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $user)
    {
        return response()->json([
            'user' => $user[0],
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
