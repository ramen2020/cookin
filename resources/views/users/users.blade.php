<h1 class="mb-5 border-bottom">全てのユーザー一覧</h1>
@if (count($users) > 0)
    <ul class="list-unstyled row">
        @foreach ($users as $user)
            <li class="col-md-3 mb-2 px-4 text-center">
                <div>
                    {{ $user->name }}
                </div>
                <div>
                    <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                
                </div>
            </li>
        @endforeach
    </ul>
@endif
{{ $users->render('pagination::bootstrap-4') }}

<h1 class="mb-5 border-bottom">お気に入りしているユーザー一覧</h1>
@if (count($favorite_users) > 0)
    <ul class="list-unstyled row">
        @foreach ($favorite_users as $user)
            <li class="col-md-3 mb-2 px-4 text-center">
                <div>
                    {{ $user->name }}
                </div>
                <div>
                    <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                </div>
            </li>
        @endforeach
    </ul>
@endif
{{ $users->render('pagination::bootstrap-4') }}