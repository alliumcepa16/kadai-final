@extends('layouts.app')

@section('content')
    @if(Auth::check())
        {{--今ログインした人の名前を表示しているけど、
        後で、ユーザ詳細ページへのリンクに変更する
        --}}
        {{ Auth::user()->name }}
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