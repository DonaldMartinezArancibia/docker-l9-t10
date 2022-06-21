<?php

namespace App\Http\Controllers;

use App\Models\Registrosalida;
use App\Models\Herramienta;
use App\Models\Empleado;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function cursos(Request $request)
    {
        $term = $request->get('term');
        $querys = Herramienta::where('Nombre','LIKE','%'.$term.'%')->get();
        $data = [];
        foreach($querys as $querys){
            $data[]=[
                'label'=> $querys->Nombre
            ];
        }
        return $data;
    }
}
