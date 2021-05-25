@if(count($logs) > 0)
    <ul class="list-unstyled">
        @foreach($logs as $log)
            <li class="media mb-3">  
                <div class="media-body">
                    <div>
                    <img src="{{asset('img/'.$log->id."/".$log->image)}}">
                    </div>
                    <div>
                        {{--投稿詳細ページへのリンク--}}
                        <p>{!! link_to_route('logs.show', $log->title, ['log'=>$log->id]) !!}</p>
                        <span class="text-muted">{{$log->date}}</span>
                    </div>                    
                    <div>
                        {{--投稿内容(Comment)--}}
                        <p class="mb-0">{!! nl2br(e($log->content)) !!}</p>
                    </div>
                    <div class="form-inline">
                        @if(Auth::id()==$log->user_id)
                            {{--投稿削除ボタンのフォーム--}}
                            {!! Form::open(['route' => ['logs.destroy', $log->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="fas fa-trash"></i>',['class'=>'btn btn-secondary btn-sm', 'type'=>'submit']) !!}
                            {!! Form::close() !!}
                        @endif
                        {{--お気に入りボタンのフォーム--}}
                        {!! Form::open() !!}
                            {!! Form::button('<i class="far fa-thumbs-up"></i>',['class'=>'btn btn-success btn-sm', 'type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{--ページネーションのリンク--}}
    {{ $logs->links() }}
@endif
        