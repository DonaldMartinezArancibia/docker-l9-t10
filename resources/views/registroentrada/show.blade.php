@extends('layouts.app')

@section('template_title')
    {{ $registroentrada->name ?? 'Show Registroentrada' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrando el Registro de Entrada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('registroentradas.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Herramientas Id:</strong>
                            {{ $registroentrada->herramientas_id }}
                        </div>
                        <div class="form-group">
                            <strong>Empleados Id:</strong>
                            {{ $registroentrada->empleados_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fechaentrada:</strong>
                            {{ $registroentrada->FechaEntrada }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $registroentrada->Observaciones }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
