@if(count($logs) > 0)
    <ul class="list-unstyled">
        @foreach($logs as $log)
            <li class="media mb-3">
                {{--投稿の所有者の写真を後で表示する--}}
                <img class="mr-2 rounded" src="#" alt="">
                <div class="media-body">
                    <div>
                        {{--投稿詳細ページへのリンク--}}
                        <p>{!! link_to_route('logs.show', $log->title, ['log'=>$log->id]) !!}</p>
                        <span class="text-muted">{{$log->date}}</span>
                    </div>                    
                    <div>
                        {{--投稿内容--}}
                        <p class="mb-0">{!! nl2br(e($log->content)) !!}</p>
                    </div>
                    @if(Auth::id()==$log->user_id)
                        {{--投稿削除ボタンのフォーム--}}
                        {!! Form::open(['route' => ['logs.destroy', $log->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="fas fa-trash"></i>',['class'=>'btn btn-secondary btn-sm', 'type'=>'submit']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
    {{--ページネーションのリンク--}}
    {{ $logs->links() }}
@endif
        