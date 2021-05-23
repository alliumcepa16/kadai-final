@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::model($log,['route' => 'logs.store'])!!}
                <div class="form-group row">
                    {!! Form::label('date','Date') !!}
                    {!! Form::text('date',null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group row">
                    {!! Form::label('title','Title') !!}
                    {!! Form::text('title',null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group row">
                    {!! Form::label('content','Comment') !!}
                    {!! Form::textarea('content',null,['class'=>'form-control', 'rows'=>'2'])!!}
                </div>
                <dv class="form-group row">
                    {!! Form::label('image','Photo') !!}
                    <div class="col-sm-6">
                        {{Form::file('image')}}
                    </div>
                </div>
                {{--エラー表示--}}
                @if($errors->first('image'))
                    <p class="alert alert-danger">{{$errors->first('image')}}</p>
                @endif
                
                {!! Form::submit('Post',['class' => 'btn btn-primary btn-block'])!!}              
            {!! Form::close() !!}
        </div>
    </div>
@endsection