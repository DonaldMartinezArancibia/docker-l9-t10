@extends('layouts.app')

@section('template_title')
    Herramienta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registro de Herramientas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('herramientas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Ingresar Nueva Herramienta') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
                                        <th>Identificador Interno</th>
										<th>Nombre</th>
										<th>Modelo</th>
										<th>Serie</th>
										<th>Categoria</th>
										<th>Factura</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($herramientas as $herramienta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $herramienta->IdInterno }}</td>
											<td>{{ $herramienta->Nombre }}</td>
											<td>{{ $herramienta->Modelo }}</td>
                                            <td>{{ $herramienta->Serie }}</td>
											<td>{{ $herramienta->Categoria }}</td>
											<td>{{ $herramienta->Factura }}</td>

                                            <td>
                                                <form action="{{ route('herramientas.destroy',$herramienta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('herramientas.show',$herramienta->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('herramientas.edit',$herramienta->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $herramientas->links() !!}
            </div>
        </div>
    </div>
@endsection
