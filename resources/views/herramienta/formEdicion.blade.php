<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Identificador Interno') }}
            {{ Form::text('', $herramienta->IdInterno, ['class' => 'form-control', 'disabled']) }}
        </div>
        <div class="form-group">
            {{ Form::label('N° de Serie') }}
            {{ Form::text('', $herramienta->Serie, ['class' => 'form-control', 'disabled']) }}
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
            {{ Form::label('N° de Factura') }}
            {{ Form::text('', $herramienta->Factura, ['class' => 'form-control', 'disabled']) }}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de Compra') }}
            {{ Form::date('FechaCompra', $herramienta->FechaCompra, ['class' => 'form-control' . ($errors->has('FechaCompra') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de compra']) }}
            {!! $errors->first('FechaCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Foto') }}
            {{ Form::file('Foto', ['class' => 'form-control' . ($errors->has('Foto') ? ' is-invalid' : ''), 'placeholder' => 'Foto']) }}
            <img src="{{ $herramienta->Foto }}" width="30%">
            {!! $errors->first('Foto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Actualizar Herramienta</button>
    </div>
</div>

<script>
    $("#Categorias_ID").select2({});
</script>