@extends('layouts.app')

@section('content')
    <div class="row">
        <div class='text-center">
            <h2>{{ $log->title }}</h2>
            <img src="#" alt="">
        </div>
        <div>
            <h3>{{ $log->date }}</h3>
            {{--投稿内容--}}
            <p class="mb-0">{!! nl2br(e($log->content)) !!}</p>
        </div>
    </div>
@endsection