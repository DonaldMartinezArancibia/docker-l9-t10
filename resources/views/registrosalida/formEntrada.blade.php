<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Fecha Entrada') }}
            {{ Form::datetimelocal('FechaEntrada', $registrosalida->FechaEntrada, ['class' => 'form-control' . ($errors->has('FechaEntrada') ? ' is-invalid' : ''), 'placeholder' => 'FechaEntrada']) }}
            {!! $errors->first('FechaEntrada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ObservacionesEntrada') }}
            {{ Form::text('ObservacionesEntrada', $registrosalida->ObservacionesEntrada, ['class' => 'form-control' . ($errors->has('ObservacionesEntrada') ? ' is-invalid' : ''), 'placeholder' => 'ObservacionesEntrada']) }}
            {!! $errors->first('ObservacionesEntrada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
            <label>Estado de la Herramienta</label>
            <select class="form-control" name="Estado" id="Estado">
                <option value="1" @if (old('active') == 1) selected @endif>Entrada</option>
            </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Ingresar Salida</button>
    </div>
</div


<div class="form-group">
    <input type="text" class="form-control" id="Search">
</div>

<script>
    // var cursos = ['Html','Laravel','Css','JavaScript','React'];
    $('#Search').autocomplete({
        source: function(request, response){
            $.ajax({
                url: '{{route('buscar.herramienta')}}',
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function(data){
                    response(data)
                }
            });
        }
    });
</script>