<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('herramientas') }}
            {{ Form::select('herramientas_id', $herramientas, $registroentrada->herramientas_id, ['class' => 'form-control' . ($errors->has('herramientas_id') ? ' is-invalid' : ''), 'placeholder' => 'Herramientas Id']) }}
            {!! $errors->first('herramientas_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleados') }}
            {{ Form::select('empleados_id', $empleados, $registroentrada->empleados_id, ['class' => 'form-control' . ($errors->has('empleados_id') ? ' is-invalid' : ''), 'placeholder' => 'Empleados Id']) }}
            {!! $errors->first('empleados_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('FechaEntrada') }}
            {{ Form::datetimelocal('FechaEntrada', $registroentrada->FechaEntrada, ['class' => 'form-control' . ($errors->has('FechaEntrada') ? ' is-invalid' : ''), 'placeholder' => 'Fechaentrada']) }}
            {!! $errors->first('FechaEntrada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Observaciones') }}
            {{ Form::text('Observaciones', $registroentrada->Observaciones, ['class' => 'form-control' . ($errors->has('Observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('Observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Ingresar Entrada</button>
    </div>
</div>