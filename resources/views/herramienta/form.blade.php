<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('IdInterno') }}
            {{ Form::text('IdInterno', $herramienta->IdInterno, ['class' => 'form-control' . ($errors->has('IdInterno') ? ' is-invalid' : ''), 'placeholder' => 'Idinterno']) }}
            {!! $errors->first('IdInterno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Serie') }}
            {{ Form::text('Serie', $herramienta->Serie, ['class' => 'form-control' . ($errors->has('Serie') ? ' is-invalid' : ''), 'placeholder' => 'Serie']) }}
            {!! $errors->first('Serie', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('Nombre', $herramienta->Nombre, ['class' => 'form-control' . ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Modelo') }}
            {{ Form::text('Modelo', $herramienta->Modelo, ['class' => 'form-control' . ($errors->has('Modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('Modelo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Categoria') }}
            {{ Form::text('Categoria', $herramienta->Categoria, ['class' => 'form-control' . ($errors->has('Categoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoria']) }}
            {!! $errors->first('Categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Proovedor') }}
            {{ Form::text('Proovedor', $herramienta->Proovedor, ['class' => 'form-control' . ($errors->has('Proovedor') ? ' is-invalid' : ''), 'placeholder' => 'Proovedor']) }}
            {!! $errors->first('Proovedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Factura') }}
            {{ Form::text('Factura', $herramienta->Factura, ['class' => 'form-control' . ($errors->has('Factura') ? ' is-invalid' : ''), 'placeholder' => 'Factura']) }}
            {!! $errors->first('Factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('FechaCompra') }}
            {{ Form::text('FechaCompra', $herramienta->FechaCompra, ['class' => 'form-control' . ($errors->has('FechaCompra') ? ' is-invalid' : ''), 'placeholder' => 'Fechacompra']) }}
            {!! $errors->first('FechaCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>