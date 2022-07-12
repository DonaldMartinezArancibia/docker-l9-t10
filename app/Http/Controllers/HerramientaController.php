<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use Illuminate\Http\Request;

/**
 * Class HerramientaController
 * @package App\Http\Controllers
 */
class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $herramientas = Herramienta::paginate();

        return view('herramienta.index', compact('herramientas'))
            ->with('i', (request()->input('page', 1) - 1) * $herramientas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $herramienta = new Herramienta();
        return view('herramienta.create', compact('herramienta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Herramienta::$rules);

        $herramienta = Herramienta::create($request->all());

        return redirect()->route('herramientas.index')
            ->with('success', 'Herramienta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $herramienta = Herramienta::find($id);

        return view('herramienta.show', compact('herramienta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $herramienta = Herramienta::find($id);

        return view('herramienta.edit', compact('herramienta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Herramienta $herramienta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Herramienta $herramienta)
    {
        request()->validate(Herramienta::$reglasDos);

        $herramienta->update($request->all());

        return redirect()->route('herramientas.index')
            ->with('success', 'Herramienta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $herramienta = Herramienta::find($id)->delete();

        return redirect()->route('herramientas.index')
            ->with('success', 'Herramienta deleted successfully');
    }
}
