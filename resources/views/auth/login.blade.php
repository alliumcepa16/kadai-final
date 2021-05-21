@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Login</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
        
            {!! Form::open(['route'=>'login.post']) !!}
                {!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'Email']) !!}
                {!! Form::password('password',['class' => 'form-control','placeholder' =>'Password']) !!}                
                <div class="text-center">
                    {!! Form::submit('Login',['class'=>'btn btn-primary']) !!}
                    {{--ユーザ登録ページへのリンク--}}
                    <p class="mt-2">New user?{!! link_to_route('signup.get','Sign up now!') !!}</p>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection