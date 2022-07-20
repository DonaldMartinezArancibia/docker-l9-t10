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
            {{ Form::label('categorias') }}
            <select name="categorias_id" id="Categorias_ID" class="form-control{{($errors->has('categorias_id') ? ' is-invalid' : '')}}">
                <option value="" selected disabled hidden>Seleccionar Categoria</option>
                @foreach($categorias as $data){
                    <option value="{{$data->id}}">{{$data->Nombre}}</option>
                }@endforeach
            </select>
            {!! $errors->first('categorias_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Proveedor') }}
            {{ Form::text('Proveedor', $herramienta->Proveedor, ['class' => 'form-control' . ($errors->has('Proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
            {!! $errors->first('Proveedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Factura') }}
            {{ Form::text('Factura', $herramienta->Factura, ['class' => 'form-control' . ($errors->has('Factura') ? ' is-invalid' : ''), 'placeholder' => 'Factura']) }}
            {!! $errors->first('Factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('FechaCompra') }}
            {{ Form::date('FechaCompra', $herramienta->FechaCompra, ['class' => 'form-control' . ($errors->has('FechaCompra') ? ' is-invalid' : ''), 'placeholder' => 'Fechacompra']) }}
            {!! $errors->first('FechaCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Foto') }}
            {{ Form::file('Foto', ['class' => 'form-control' . ($errors->has('Foto') ? ' is-invalid' : ''), 'placeholder' => 'Foto']) }}
            {!! $errors->first('Foto', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Ingresar Herramienta</button>
    </div>
</div>

<script>
    $("#Categorias_ID").select2({});
</script>