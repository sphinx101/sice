<div class="col-md-5">
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Datos Personales</h3>
        </div>
        {!! Form::open(['role'=>'form','route'=>'alumnos.store']) !!}
        <input type="hidden" name="centrotrabajo_id" value="{{Auth::user()->docente->centrotrabajo->id}}">
        <div class="box-body">
            <div class="form-group has-feedback {{$errors->has('curp')?'has-error':''}}">
                {!! Form::label('lblcurp','CURP',array('class'=>'sr-only')) !!}
                {!! Form::text('curp',null,array('class'=>'form-control lblcurp','id'=>'lblcurp','placeholder'=>'CURP Alumno')) !!}
                @if($errors->has('curp'))
                    <span class="help-block">
                         <strong>{{$errors->first('curp')}}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{$errors->has('nombre')?'has-error':''}}">
                {!! Form::label('lblNombre','Nombre',array('class'=>'sr-only')) !!}
                {!! Form::text('nombre',null,array('class'=>'form-control lblnombre','id'=>'lblNombre','placeholder'=>'Nombre Alumno')) !!}
                @if($errors->has('nombre'))
                    <span class="help-block">
                         <strong>{{$errors->first('nombre')}}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{$errors->has('appaterno')?'has-error':''}}">
                {!! Form::label('lblPaterno','Paterno',array('class'=>'sr-only')) !!}
                {!! Form::text('appaterno',null,array('class'=>'form-control lblpaterno','id'=>'lblPaterno','placeholder'=>'Ap. Paterno')) !!}
                @if($errors->has('appaterno'))
                    <span class="help-block">
                         <strong>{{$errors->first('appaterno')}}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{$errors->has('apmaterno')?'has-error':''}}">
                {!! Form::label('lblMaterno','Materno',array('class'=>'sr-only')) !!}
                {!! Form::text('apmaterno',null,array('class'=>'form-control lblmaterno','id'=>'lblMaterno','placeholder'=>'Ap. Materno')) !!}
                @if($errors->has('apmaterno'))
                    <span class="help-block">
                         <strong>{{$errors->first('apmaterno')}}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>