@extends('layouts')

@section('content')
    <div class="text-center">
        <h1>Login</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
        
            {!! Form::open(['route'=>'login.post']) !!}
                {!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'email']) !!}
                {!! Form::password('password',null,['class' => 'form-control', 'placeholder' => 'password']) !!}
                
                {!! Form::submit('Login',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
            
            {{--ユーザ登録ページへのリンク--}}
            <p class="mt-2">New user?{!! link_to_route('signup.get','Sign up now!') !!}</p>
        </div>
    </div>
@endsection