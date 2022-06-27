@extends('layouts.app')

@section('template_title')
    Update Registrosalida
@endsection

@section('content')
    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('registrosalidas.index') }}"> Volver</a>
    </div>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizando este Registro</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('registrosalidas.update', $registrosalida->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('registrosalida.formEntrada')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
