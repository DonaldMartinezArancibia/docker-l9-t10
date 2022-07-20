<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use App\Models\Categoria;
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
        $categorias=Categoria::all('id','Nombre');
        return view('herramienta.create', compact('herramienta','categorias'));
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

        $requestData = $request->all();

        if ($request->file('Foto') != NULL) {
            $fileName = $request->file('Foto')->getClientOriginalName();
            $path = $request->file('Foto')->storeAs('uploads',$fileName,'public');
            $requestData['Foto'] = '/storage/'.$path;
            $herramienta = Herramienta::create($requestData);
        } else {
            $herramienta = Herramienta::create($request->all());
        }
        
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
        $categorias=Categoria::all('id','Nombre');
        
        return view('herramienta.edit', compact('herramienta','categorias'));
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

        if ($request->file('Foto') != NULL) {
            $fileName = $request->file('Foto')->getClientOriginalName();
            $path = $request->file('Foto')->storeAs('uploads',$fileName,'public');
            $requestData['Foto'] = '/storage/'.$path;
            $herramienta->update($requestData);
        } else {
            $herramienta->update($request->all());
        }

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
