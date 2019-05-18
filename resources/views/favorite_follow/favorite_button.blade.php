@if (Auth::id() != $user->id)
    @if (Auth::user()->is_favorites($user->id))
        {!! Form::open(['route' => ['user.unfavorite', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('いいね取り消し', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favorite', $user->id]]) !!}
            {!! Form::submit('いいね！', ['class' => "btn btn-warning btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif
