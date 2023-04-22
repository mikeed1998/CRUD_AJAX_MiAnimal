<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB; //Trabajar con base de datos utilizando procedimientos almacenados
use Illuminate\Http\Request; // Recuperar datos de la vista
use Yajra\DataTables\Facades\DataTables;

class AnimalController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()) {  
            $animales = DB::select("SELECT * FROM animal");
            return DataTables::of($animales)
                ->addColumn('action', function($animales) {
                    $acciones = '<a href="" class="btn btn-info btn-sm"> Editar </a>';
                    $acciones .= '&nbsp; <button type="button" name="delete" id="" class="btn btn-danger btn-sm"> Eliminar </button>';
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('animal.index');
    }

    public function registrar(Request $request) {
        $animal = DB::select("INSERT INTO animal(nombre, especie, genero) VALUES (?, ?, ?)", [$request->nombre, $request->especie, $request->genero]);
        
        return back();
    }
}







