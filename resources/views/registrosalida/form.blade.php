<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('herramientas') }}
            {{ Form::select('herramientas_id',$herramientas, $registrosalida->herramientas_id, ['class' => 'form-control' . ($errors->has('herramientas_id') ? ' is-invalid' : ''), 'placeholder' => 'Herramienta']) }}
            {!! $errors->first('herramientas_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleados') }}
            {{ Form::select('empleados_id', $empleados, $registrosalida->empleados_id, ['class' => 'form-control' . ($errors->has('empleados_id') ? ' is-invalid' : ''), 'placeholder' => 'Empleados Id']) }}
            {!! $errors->first('empleados_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha Salida') }}
            {{ Form::datetimelocal('FechaSalida', $registrosalida->FechaSalida, ['class' => 'form-control' . ($errors->has('FechaSalida') ? ' is-invalid' : ''), 'placeholder' => 'Fechasalida']) }}
            {!! $errors->first('FechaSalida', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('ObservacionesSalida') }}
            {{ Form::text('ObservacionesSalida', $registrosalida->ObservacionesSalida, ['class' => 'form-control' . ($errors->has('ObservacionesSalida') ? ' is-invalid' : ''), 'placeholder' => 'ObservacionesSalida']) }}
            {!! $errors->first('ObservacionesSalida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
       

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Ingresar Salida</button>
    </div>
</div>