@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                {{--ユーザのあらかじめ用意した写真を表示　後で追記--}}
                <img class="mr-2 rounded" src="#" alt="">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{--ユーザ詳細ページへのリンク--}}
                        <p>{!! link_to_route('users.show', 'View profile', ['user' => $user-> id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{--ページネーションのリンク--}}
    {{ $users->links() }}
@endif
                