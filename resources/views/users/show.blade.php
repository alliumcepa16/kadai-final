@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    {{--ユーザのあらかじめ登録した写真を表示する予定--}}
                    <img src="#" alt="">
                </div>
                <div class="text-center">
                {{--投稿フォームへのリンク--}}
                    {!! link_to_route('logs.create','Log page',[],['class' => ' btn btn-primary']) !!}
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                {{--タイムラインタブ--}}
                <li class="nav-item"><a href="#" class="nav-link">TimeLine</li>
                {{--お気に入りタブ--}}
                <li class="nav-item"><a href="#" class="nav-link">Favorites</li>
            </ul>
            {{--投稿一覧--}}
            @include('logs.logs')
        </div>
    </div>
@endsection