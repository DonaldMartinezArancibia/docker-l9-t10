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
                                {{ __('Herramienta') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('herramientas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Serie</th>
										<th>Nombre</th>
										<th>Modelo</th>
										<th>Categoria</th>
										<th>Factura</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($herramientas as $herramienta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $herramienta->Serie }}</td>
											<td>{{ $herramienta->Nombre }}</td>
											<td>{{ $herramienta->Modelo }}</td>
											<td>{{ $herramienta->Categoria }}</td>
											<td>{{ $herramienta->Factura }}</td>

                                            <td>
                                                <form action="{{ route('herramientas.destroy',$herramienta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('herramientas.show',$herramienta->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('herramientas.edit',$herramienta->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
