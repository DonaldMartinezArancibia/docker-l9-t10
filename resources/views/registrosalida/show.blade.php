@extends('layouts.app')

@section('template_title')
    {{ $registrosalida->name ?? 'Show Registrosalida' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrando el Registro de Salida</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('registrosalidas.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Herramientas Id:</strong>
                            {{ $registrosalida->herramientas_id }}
                        </div>
                        <div class="form-group">
                            <strong>Empleados Id:</strong>
                            {{ $registrosalida->herramientas_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fechasalida:</strong>
                            {{ $registrosalida->FechaSalida }}
                        </div>
                        <div class="form-group">
                            <strong>Fechasalida:</strong>
                            {{ $registrosalida->FechaEntrada }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones al registrar la salida:</strong>
                            {{ $registrosalida->ObservacionesSalida }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones al registrar la entrada:</strong>
                            {{ $registrosalida->ObservacionesEntrada }}
                        </div>
                        <div class="form-group">
                            <strong>Estado de la Herramienta</strong>
                            {{ $registrosalida->Estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
