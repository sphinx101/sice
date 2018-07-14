<div class="form-group">
    {!! Form::label('','Type',array('class'=>'sr-only')) !!}
    {!! Form::select('type',array('4'=>'docente','3'=>'director'),null,['class'=>'form-control']) !!}

</div>
<div class="form-group has-feedback {{$errors->has('email')?'has-error':''}}">
    {!! Form::label('lblemail','email',array('class'=>'sr-only')) !!}
    {!! Form::text('email',null,array('class'=>'form-control','id'=>'lblemail','placeholder'=>'Introduce  Email')) !!}
    @if($errors->has('email'))
        <span class="help-block">
             <strong>{{$errors->first('email')}}</strong>
         </span>
    @endif
</div>