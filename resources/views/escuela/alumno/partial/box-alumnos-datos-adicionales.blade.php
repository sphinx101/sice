<div class="col-md-7">
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Datos Adicionales</h3>
        </div>
        <div class="box-body">
            <div class="form-group has-feedback {{$errors->has('domicilio')?'has-error':''}}">
                {!! Form::label('lblDomicilio','Domicilio',array('class'=>'sr-only')) !!}
                {!! Form::text('domicilio',null,array('class'=>'form-control lbldomicilio','id'=>'lblDomicilio','placeholder'=>'Domicilio')) !!}
                @if($errors->has('domicilio'))
                    <span class="help-block">
                         <strong>{{$errors->first('domicilio')}}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{$errors->has('localidad')?'has-error':''}}">
                {!! Form::label('lblLocalidad','Localidad',array('class'=>'sr-only')) !!}
                {!! Form::text('localidad',null,array('class'=>'form-control lbllocalidad','id'=>'lblLocalidad','placeholder'=>'Localidad')) !!}
                @if($errors->has('localidad'))
                    <span class="help-block">
                         <strong>{{$errors->first('localidad')}}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{$errors->has('localidad')?'has-error':''}}">
                {!! Form::label('lblMunicipio','Municipio',array('class'=>'sr-only')) !!}
                {!! Form::text('municipio',null,array('class'=>'form-control lblMunicipio','id'=>'lblMunicipio','placeholder'=>'Municipio')) !!}
                @if($errors->has('municipio'))
                    <span class="help-block">
                         <strong>{{$errors->first('municipio')}}</strong>
                    </span>
                @endif
            </div>
        </div>
        @include('escuela.partial.box-close-form-and-submit')
    </div>
</div>