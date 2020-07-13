@extends('layouts.app')

@section('content')

<div class="blade1">
    <h3 class="my-5 border-bottom text-center pb-2">全てのユーザー</h3>
    @if (count($users) > 0)
        <ul class="list-unstyled">
            @foreach ($users as $user)
            <li class="p-2">
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
    <h3 class="my-5 border-bottom text-center pb-2">お気に入りのユーザー</h3>
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
    {{ $users->render('pagination::bootstrap-4') }}
    @endif
</div>
@endsection