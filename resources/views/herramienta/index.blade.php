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
                            <table class="table table-striped table-hover" id="registros">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Idinterno</th>
										<th>Serie</th>
										<th>Nombre</th>
										<th>Modelo</th>
										<th>Categoria</th>
										<th>Proveedor</th>
										<th>Factura</th>
										<th>Fecha de compra</th>
										<th>Foto</th>
                                        <th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($herramientas as $herramienta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $herramienta->IdInterno }}</td>
											<td>{{ $herramienta->Serie }}</td>
											<td>{{ $herramienta->Nombre }}</td>
											<td>{{ $herramienta->Modelo }}</td>
											<td><?php if($herramienta->categoria == NULL){ echo("<i style='color:red;'>Registro Borrado</i>"); }else{ echo($herramienta->categoria->Nombre); } ?></td>
											<td>{{ $herramienta->Proveedor }}</td>
											<td>{{ $herramienta->Factura }}</td>
											<td>{{ $herramienta->FechaCompra }}</td>
                                            <td><img src="{{ $herramienta->Foto }}" width="50" class="imgZoom"></td>
                                            <td><?php if($herramienta->Estado == '1'){ ?><div class="btn btn-success">Dentro</div><?php }else{ ?><div class="btn btn-danger">Fuera</div><?php } ?></td>

                                            <td>
                                                <form action="{{ route('herramientas.destroy',$herramienta->id) }}" method="POST" class="formulario-eliminar">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('herramientas.show',$herramienta->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('herramientas.edit',$herramienta->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
@if(session('success')=='Herramienta deleted successfully')
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
