@extends('layouts.app')

@section('template_title')
    Registroentrada
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registros de Entradas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('registroentradas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Ingresar un nuevo Registro de Entrada') }}
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
                            <table class="table table-striped table-hover" id="registros">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Herramienta</th>
                                        <th>Empleado</th>
										<th>Fecha de Entrada</th>
										<th>Observaciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registroentradas as $registroentrada)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $registroentrada->herramienta->Nombre }}</td>
                                            <td>{{ $registroentrada->empleado->Nombre; }} {{ $registroentrada->empleado->PrimerApellido; }} {{ $registroentrada->empleado->SegundoApellido; }}</td>
											<td>{{ $registroentrada->FechaEntrada }}</td>
											<td>{{ $registroentrada->Observaciones }}</td>

                                            <td>
                                                <form action="{{ route('registroentradas.destroy',$registroentrada->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registroentradas.show',$registroentrada->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('registroentradas.edit',$registroentrada->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $registroentradas->links() !!}
            </div>
        </div>
    </div>
    <script>
        $("#registros").DataTable({});
    </script>
@endsection
