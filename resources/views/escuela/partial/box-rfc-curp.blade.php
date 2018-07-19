<div class="col-md-4 col-md-offset-2">
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">CCT - RFC - CURP</h3>
            <!--div class="box-tools pull-right"-->
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <!--span class="label label-primary">Label</span>
        </div-->
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        @if($booCrearUsuario)
            {!! Form::open(['role'=>'form','route'=>'docentes.store']) !!}

        @else
            {!! Form::open(['role'=>'form','route'=>'perfil.store']) !!}
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
        @endif

        <div class="box-body">

            <div class="form-group">
                {!! Form::label('','CCT',array('class'=>'sr-only')) !!}
                {!! Form::select('centrotrabajo_id',$ccts,null,['class'=>'form-control']) !!}

            </div>
            <div class="form-group has-feedback {{$errors->has('rfc')?'has-error':''}}">
                {!! Form::label('lblrfc','RFC',array('class'=>'sr-only')) !!}
                {!! Form::text('rfc',null,array('class'=>'form-control','id'=>'lblrfc','placeholder'=>'Introduce  RFC')) !!}
                @if($errors->has('rfc'))
                    <span class="help-block">
                         <strong>{{$errors->first('rfc')}}</strong>
                     </span>
                @endif
            </div>

            <div class="form-group has-feedback {{$errors->has('curp')?'has-error':''}} ">
                {!! Form::label('lblcurp','CURP',array('class'=>'sr-only')) !!}
                {!! Form::text('curp',null,array('class'=>'form-control','id'=>'lblcurp','placeholder'=>'Introduce  CURP')) !!}
                @if($errors->has('curp'))
                    <span class="help-block">
                                 <strong>{{$errors->first('curp')}}</strong>
                             </span>
                @endif
            </div>

        </div>

    </div>
    @include('escuela.partial.box-datos-personales-docente')
</div>
