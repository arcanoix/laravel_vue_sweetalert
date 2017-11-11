<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function lista(){

        $usuarios = User::all();

        //return view('lista')->with('usuarios', $usuarios);
        return response()->json([
            'usuarios' => $usuarios
        ]);
    }

    public function listar(){

        $usuarios = User::all();

        return view('listar')->with('usuarios', $usuarios);
    }


    public function destroy(Request $request, $id){

        $buscador= User::find($id);

        if($request->ajax()){
            $buscador->delete();
            return response()->json($buscador);
        }
    }
}
