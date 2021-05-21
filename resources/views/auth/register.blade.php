@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Signup</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
        
            {!! Form::open(['route' => 'signup.post']) !!}
                {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'name']) !!}
                {!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'email']) !!}
                {!! Form::password('password',['class' => 'form-control','placeholder' =>'password']) !!}
                {!! Form::password('password_confirmation',['class' => 'form-control','placeholder' => 'password_confirmation']) !!}
            
                {!! Form::submit('Signup',['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection