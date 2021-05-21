@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Sign up</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
        
            {!! Form::open(['route' => 'signup.post']) !!}
                {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Name']) !!}
                {!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'Email']) !!}
                {!! Form::password('password',['class' => 'form-control','placeholder' =>'Password']) !!}
                {!! Form::password('password_confirmation',['class' => 'form-control','placeholder' => 'Password Confirmation']) !!}
                <div class="text-center">
                    {!! Form::submit('Sign up',['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection