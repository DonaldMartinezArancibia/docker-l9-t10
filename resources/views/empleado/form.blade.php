<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('Nombre', $empleado->Nombre, ['class' => 'form-control' . ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('PrimerApellido') }}
            {{ Form::text('PrimerApellido', $empleado->PrimerApellido, ['class' => 'form-control' . ($errors->has('PrimerApellido') ? ' is-invalid' : ''), 'placeholder' => 'Primerapellido']) }}
            {!! $errors->first('PrimerApellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('SegundoApellido') }}
            {{ Form::text('SegundoApellido', $empleado->SegundoApellido, ['class' => 'form-control' . ($errors->has('SegundoApellido') ? ' is-invalid' : ''), 'placeholder' => 'Segundoapellido']) }}
            {!! $errors->first('SegundoApellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>