@extends('layouts.app')

@section('template_title')
    {{ $herramienta->name ?? 'Show Herramienta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrando Herramienta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('herramientas.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Identificador Interno:</strong>
                            {{ $herramienta->IdInterno }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $herramienta->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $herramienta->Modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Serie:</strong>
                            {{ $herramienta->Serie }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $herramienta->Categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Factura:</strong>
                            {{ $herramienta->Factura }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
