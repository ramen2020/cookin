@extends('layouts.app')

@section('content')

<div class=" mb-5 px-3 py-4">
    <h1 class="text-center my-5">{{ $delivery->name }}</h1>
    <div class="Mypicture">
        <img src="{{ $delivery->img }}" class="my-delivery-img">
    </div>
    <div class="my-content-wrapper">
        <p class="mt-4"> 販売場所<br>{{ $delivery->place }}</p>
        <p> 価格<br>¥ {{ $delivery->price }}</p>
        <p>商品情報<br>{{ $delivery->content }}</p>
        <div>
            <div>
                {!! link_to_route('users.show', '出品者情報', ['id' =>$delivery->user_id], ['class' => 'btn btn-info mt-5'])
                !!}
            </div>
            <div>
                @if (Auth::id() == $delivery->user_id)
                {!! Form::open(['route' => ['deliveries.destroy', $delivery->id], 'method' => 'delete']) !!}
                {!! link_to_route('deliveries.edit', '出品編集', ['id' => $delivery->id], ['class' => 'btn btn-light mt-2'])
                !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm float-right mt-2 mr-3']) !!}
                {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
</div>

<!--コメント機能-->
<div class="border px-5 py-4 mb-5">
    @include('messages.messages', ['messages' => $messages])
    {!! Form::model($messages, ['route' => 'messages.store']) !!}
    <input name="delivery_id" type="hidden" value="{{ $delivery->id }}">
    <div class="form-group">
        {!! Form::label('content', 'コメント:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('投稿', ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}
</div>

@endsection