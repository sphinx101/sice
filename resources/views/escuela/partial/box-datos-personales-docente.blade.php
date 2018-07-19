
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Datos Personales</h3>
            <!--div class="box-tools pull-right"-->
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <!--span class="label label-primary">Label</span>
        </div-->
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group has-feedback {{$errors->has('nombre')?'has-error':''}}">
                {!! Form::label('lblNombre','Nombre',array('class'=>'sr-only')) !!}
                {!! Form::text('nombre',null,array('class'=>'form-control','id'=>'lblNombre','placeholder'=>'Introduce  Nombre')) !!}
                @if($errors->has('nombre'))
                    <span class="help-block">
                                     <strong>{{$errors->first('nombre')}}</strong>
                     </span>
                @endif
            </div>

            <div class="form-group has-feedback {{$errors->has('appaterno')?'has-error':''}}">
                {!! Form::label('lblPaterno','Paterno',array('class'=>'sr-only')) !!}
                {!! Form::text('appaterno',null,array('class'=>'form-control','id'=>'lblPaterno','placeholder'=>'Introduce  Apellido Paterno')) !!}
                @if($errors->has('appaterno'))
                    <span class="help-block">
                                     <strong>{{$errors->first('appaterno')}}</strong>
                                 </span>
                @endif
            </div>

            <div class="form-group has-feedback {{$errors->has('apmaterno')?'has-error':''}}">
                {!! Form::label('lblMaterno','Materno',array('class'=>'sr-only')) !!}
                {!! Form::text('apmaterno',null,array('class'=>'form-control','id'=>'lblMaterno','placeholder'=>'Introduce  Apellido Materno')) !!}
                @if($errors->has('apmaterno'))
                    <span class="help-block">
                                     <strong>{{$errors->first('apmaterno')}}</strong>
                                 </span>
                @endif
            </div>
        </div>
    </div>
