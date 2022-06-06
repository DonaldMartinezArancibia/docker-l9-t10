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
                            <span class="card-title">Show Registrosalida</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('registrosalidas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Herramientas Id:</strong>
                            {{ $registrosalida->herramientas_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fechasalida:</strong>
                            {{ $registrosalida->FechaSalida }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $registrosalida->Observaciones }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
