<div class="col-md-4">
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Informacion Adicional</h3>
            <!--div class="box-tools pull-right"-->
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <!--span class="label label-primary">Label</span>
        </div-->
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group has-feedback {{$errors->has('domicilio')?'has-error':''}}">
                {!! Form::label('lblDomicilio','Domicilio',array('class'=>'sr-only')) !!}
                {!! Form::text('domicilio',null,array('class'=>'form-control','id'=>'lblDomicilio','placeholder'=>'Introduce  Domicilio')) !!}
                @if($errors->has('domicilio'))
                    <span class="help-block">
                                     <strong>{{$errors->first('domicilio')}}</strong>
                                 </span>
                @endif
            </div>
            <div class="form-group has-feedback {{$errors->has('localidad')?'has-error':''}}">
                {!! Form::label('lblLocalidad','Localidad',array('class'=>'sr-only')) !!}
                {!! Form::text('localidad',null,array('class'=>'form-control','id'=>'lblLocalidad','placeholder'=>'Introduce  Localidad')) !!}
                @if($errors->has('localidad'))
                    <span class="help-block">
                         <strong>{{$errors->first('localidad')}}</strong>
                     </span>
                @endif
            </div>
            <div class="form-group has-feedback {{$errors->has('municipio')?'has-error':''}}">
                {!! Form::label('lblMunicipio','Municipio',array('class'=>'sr-only')) !!}
                {!! Form::text('municipio',null,array('class'=>'form-control','id'=>'lblMunicipio','placeholder'=>'Introduce  Municipio')) !!}
                @if($errors->has('municipio'))
                    <span class="help-block">
                                         <strong>{{$errors->first('municipio')}}</strong>
                                     </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('lblCelular','Celular',array('class'=>'sr-only')) !!}
                {!! Form::text('celular',null,array('class'=>'form-control','id'=>'lblCelular','placeholder'=>'Introduce # Celular')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lblTelefono','Telefono',array('class'=>'sr-only')) !!}
                {!! Form::text('telefono',null,array('class'=>'form-control','id'=>'lblTelefono','placeholder'=>'Introduce # Tel. Particular')) !!}
            </div>

            @if($booCrearUsuario)
                @include('escuela.partial.campos-datos-adicionales-docente-usuario-email')
            @endif

            <input type="hidden" name="actualizado" value="1">

        </div>
    </div>
</div>