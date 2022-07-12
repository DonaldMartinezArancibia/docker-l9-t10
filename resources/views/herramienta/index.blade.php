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
										<th>Proovedor</th>
										<th>Factura</th>
										<th>Fechacompra</th>
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
											<td>{{ $herramienta->Categoria }}</td>
											<td>{{ $herramienta->Proovedor }}</td>
											<td>{{ $herramienta->Factura }}</td>
											<td>{{ $herramienta->FechaCompra }}</td>
                                            <td><?php if($herramienta->Estado == '1'){ ?><div class="btn btn-success">Dentro</div><?php }else{ ?><div class="btn btn-danger">Fuera</div><?php } ?></td>

                                            <td>
                                                <form action="{{ route('herramientas.destroy',$herramienta->id) }}" method="POST" class="formulario-eliminar">
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
            </div>
        </div>
    </div>
@if(session('success')=='Herramienta deleted successfully')
<script>    
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
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
                "next": "siguiente",
                "previous": "Anterior"
                }
            }
        });
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                this.submit();
              }
            })
        });
    </script>
@endsection
