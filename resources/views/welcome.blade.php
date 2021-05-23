@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        {{--認証済みユーザの写真を後で表示する--}}
                        <img src="#" alt="">
                    </div>
                    <div>
                        {{--投稿フォームへのリンク--}}
                        {!! link_to_route('logs.create','Log page',[],['class' => ' btn btn-primary']) !!}
                    </div>
                </div>
            </aside>
            <div class="col-sm-8">
                {{--投稿一覧--}}
                @include('logs.logs')
            </div>
        </div>
    @else
        <div class="row">
            <div class="col text-center">
                <img class="mx-auto d-block" src="/defaultImg/top/1.JPG" alt="山の写真">
                {{--ユーザ登録ページへのリンク--}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection