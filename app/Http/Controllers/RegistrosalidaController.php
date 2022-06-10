<?php

namespace App\Http\Controllers;

use App\Models\Registrosalida;
use App\Models\Herramienta;
use App\Models\Empleado;
use Illuminate\Http\Request;

/**
 * Class RegistrosalidaController
 * @package App\Http\Controllers
 */
class RegistrosalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrosalidas = Registrosalida::paginate();

        return view('registrosalida.index', compact('registrosalidas'))
            ->with('i', (request()->input('page', 1) - 1) * $registrosalidas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registrosalida = new Registrosalida();
        $empleados=Empleado::select('Nombre','PrimerApellido')->paginate();
        $herramientas=Herramienta::pluck('Nombre', 'id');
        return view('registrosalida.create', compact('registrosalida','herramientas'),compact('registrosalida','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Registrosalida::$rules);

        $registrosalida = Registrosalida::create($request->all());

        return redirect()->route('registrosalidas.index')
            ->with('success', 'Registrosalida created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registrosalida = Registrosalida::find($id);

        return view('registrosalida.show', compact('registrosalida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registrosalida = Registrosalida::find($id);
        $empleados=Empleado::select('Nombre','PrimerApellido')->paginate();
        $herramientas=Herramienta::pluck('Nombre', 'id');
        return view('registrosalida.edit', compact('registrosalida','herramientas'),compact('registrosalida','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Registrosalida $registrosalida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registrosalida $registrosalida)
    {
        request()->validate(Registrosalida::$rules);

        $registrosalida->update($request->all());

        return redirect()->route('registrosalidas.index')
            ->with('success', 'Registrosalida updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $registrosalida = Registrosalida::find($id)->delete();

        return redirect()->route('registrosalidas.index')
            ->with('success', 'Registrosalida deleted successfully');
    }
}
