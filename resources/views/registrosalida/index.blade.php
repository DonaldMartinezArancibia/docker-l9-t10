@extends('layouts.app')

@section('template_title')
    Registrosalida
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registros de Salidas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('registrosalidas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Ingresar un nuevo Registro de Salida') }}
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
										<th>Herramienta</th>
                                        <th>Empleado</th>
										<th>Fecha de Salida</th>
										<th>Observaciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrosalidas as $registrosalida)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $registrosalida->herramienta->Nombre }}</td>
                                            <td>{{ $registrosalida->empleado->Nombre; }} {{ $registrosalida->empleado->PrimerApellido; }} {{ $registrosalida->empleado->SegundoApellido; }}</td>
											<td>{{ $registrosalida->FechaSalida }}</td>
											<td>{{ $registrosalida->Observaciones }}</td>

                                            <td>
                                                <form action="{{ route('registrosalidas.destroy',$registrosalida->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registrosalidas.show',$registrosalida->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('registrosalidas.edit',$registrosalida->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $registrosalidas->links() !!}
            </div>
        </div>
    </div>
@endsection
