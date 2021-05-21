@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <img class="mx-auto d-block" src="/defaultImg/top/1.JPG" alt="山の写真">
            {{--ユーザ登録ページへのリンク--}}
            {!! link_to_route('signup.get','Signup now!', [],['class' => 'btn btn-lg btn-primary']) !!}
            
        </div>
    </div>
@endsection