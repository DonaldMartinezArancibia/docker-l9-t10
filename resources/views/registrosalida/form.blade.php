<div class="box box-info padding-1">
    <div class="box-body">
        

        <div class="form-group">
            {{ Form::label('empleados') }}
            <select name="empleados_id" id="Empleados_ID" class="form-control{{($errors->has('empleados_id') ? ' is-invalid' : '')}}">
                <option value="" selected disabled hidden>Seleccionar Empleado</option>
                @foreach($empleados as $data){
                    <option value="{{$data->id}}">{{$data->Nombre." ".$data->PrimerApellido." ".$data->SegundoApellido}}</option>
                }@endforeach
            </select>
            {!! $errors->first('empleados_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Herramientas') }}
            <select name="herramientas_id" id="Herramientas_ID" class="form-control{{($errors->has('herramientas_id') ? ' is-invalid' : '')}}">
                <option value="" selected disabled hidden>Seleccionar Herramienta</option>
                @foreach($herramientas as $data){
                    <option value="{{$data->id}}">{{$data->id." ".$data->Nombre." ".$data->IdInterno}}</option>
                }@endforeach
            </select>
            {!! $errors->first('herramientas_id', '<div class="invalid-feedback">:message</div>') !!}
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


<script>
    $("#Empleados_ID").select2({});
    $("#Herramientas_ID").select2({});
</script>