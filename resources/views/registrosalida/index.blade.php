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
                                {{ __('Registros') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('registrosalidas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Ingresar un nuevo Registro') }}
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
                                        <th>Id Herramienta</th>
                                        <th>Empleado</th>
										<th>Fecha de Salida</th>
                                        <th>Fecha de Entrada</th>
										<th>Observaciones al registrar la salida</th>
                                        <th>Observaciones al registrar la entrada</th>
                                        <th>Ubicacion</th>
                                        <th>Estado de la herramienta</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrosalidas as $registrosalida)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td><?php if($registrosalida->herramienta == NULL){ echo("<i style='color:red;'>Registro Borrado</i>"); }else{ echo($registrosalida->herramienta->Nombre); } ?></td>
                                            <td><?php if($registrosalida->herramienta == NULL){ echo("<i style='color:red;'>Registro Borrado</i>"); }else{ echo($registrosalida->herramienta->IdInterno); } ?></td>
                                            <td><?php if($registrosalida->empleado == NULL){ echo("<i style='color:red;'>Registro Borrado</i>"); }else{ echo($registrosalida->empleado->Nombre." ".$registrosalida->empleado->PrimerApellido." ".$registrosalida->empleado->SegundoApellido); } ?></td>
											<td>{{ $registrosalida->FechaSalida }}</td>
                                            <td>{{ $registrosalida->FechaEntrada }}</td>
											<td>{{ $registrosalida->ObservacionesSalida }}</td>
                                            <td>{{ $registrosalida->ObservacionesEntrada }}</td>
                                            <td>{{ $registrosalida->Ubicacion }}</td>
                                            <td><?php if($registrosalida->EstadoRegistro == '1'){ ?><div class="btn btn-success">Dentro</div><?php }else{ ?><div class="btn btn-danger">Fuera</div><?php } ?></td>

                                            <td>
                                                <form action="{{ route('registrosalidas.destroy',$registrosalida->id) }}" method="POST" class="formulario-eliminar">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registrosalidas.show',$registrosalida->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('registrosalidas.edit',$registrosalida->id) }}"><i class="fa fa-fw fa-edit"></i>Actualizar Registro</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@if(session('success')=='Registrosalida deleted successfully')
<script>    
    Swal.fire(
      '¡Borrado!',
      'El registro ha sido borrado con éxito.',
      'success'
    )
</script>
@endif
        <script>
        $("#registros").DataTable({
            responsive:true,
            autoWidth:false,
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
                }
            }
        });
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
              title: '¿Estás seguro?',
              text: "¡No podrás retroceder esta acción!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: '¡Sí, borrar!',
              cancelButtonText: 'Cancelar'
            }).then((result) => {
              if (result.isConfirmed) {
                this.submit();
              }
            })
        });
    </script>
@endsection
