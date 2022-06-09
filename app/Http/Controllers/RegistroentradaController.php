<?php

namespace App\Http\Controllers;

use App\Models\Registroentrada;
use App\Models\Herramienta;
use App\Models\Empleado;
use Illuminate\Http\Request;

/**
 * Class RegistroentradaController
 * @package App\Http\Controllers
 */
class RegistroentradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registroentradas = Registroentrada::paginate();

        return view('registroentrada.index', compact('registroentradas'))
            ->with('i', (request()->input('page', 1) - 1) * $registroentradas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registroentrada = new Registroentrada();
        $empleados=Empleado::select('Nombre','PrimerApellido')->paginate();
        $herramientas=Herramienta::pluck('Nombre', 'id');
        return view('registroentrada.create', compact('registroentrada','herramientas'),compact('registroentrada','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Registroentrada::$rules);

        $registroentrada = Registroentrada::create($request->all());

        return redirect()->route('registroentradas.index')
            ->with('success', 'Registroentrada created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registroentrada = Registroentrada::find($id);

        return view('registroentrada.show', compact('registroentrada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registroentrada = Registroentrada::find($id);
        $empleados=Empleado::pluck('Nombre','PrimerApellido','SegundoApellido','id');
        $herramientas=Herramienta::pluck('Nombre', 'id');
        return view('registroentrada.edit', compact('registroentrada','herramientas'),compact('registroentrada','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Registroentrada $registroentrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registroentrada $registroentrada)
    {
        request()->validate(Registroentrada::$rules);

        $registroentrada->update($request->all());

        return redirect()->route('registroentradas.index')
            ->with('success', 'Registroentrada updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $registroentrada = Registroentrada::find($id)->delete();

        return redirect()->route('registroentradas.index')
            ->with('success', 'Registroentrada deleted successfully');
    }
}
