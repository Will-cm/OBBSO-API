<?php

namespace App\Http\Controllers;

use App\Models\Empleado;  //
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleado = Empleado::all();    
        return response()->json($empleado);
    }


    public function store(Request $request)
    {
        $empleado = new Empleado(request()->all());
        $empleado->save();
        return response()->json(['message' => 'User created successfully', 'user' => $empleado]);
    }
}
