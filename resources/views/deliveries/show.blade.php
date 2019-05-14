@extends('layouts.app')

@section('content')

    <div class="border mb-5 px-5 py-4">
    
      <h1 class="text-center mb-3">商品：{{ $delivery->name }}</h1>
               
        <div class="mt-3 mb-3">
            <p> 販売場所<br>{{ $delivery->place }}</p>
            <p> 価格<br>{{ $delivery->price }}</p>
            <p>商品情報<br>{{ $delivery->content }}</p>
       
                    
        @if (Auth::id() == $delivery->user_id)
            {!! Form::open(['route' => ['deliveries.destroy', $delivery->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! link_to_route('deliveries.edit', 'この出品を編集', ['id' => $delivery->id], ['class' => 'btn btn-light']) !!}
            {!! Form::close() !!}
        @endif
        </div>
                
            {!! link_to_route('users.show', '出品者情報', ['id' =>$delivery->user_id], ['class' => 'btn btn-light']) !!}     
                 
        </div>
                    
                    <!--コメント機能-->
    <div class="border px-5 py-4">           
        <h1 class="text-center mt-5 mb-5">コメント一覧</h1>
         @if (count($messages) > 0)
           @foreach ($messages as $message)
                <div class="border-top p-4">
                    <div class="d-flex">
                        <p class="mr-3">名前：{{ $message->user_id }}</p>
                        <time class="text-secondary">
                            {{ $message->created_at->format('Y.m.d H:i') }}
                        </time>
                    </div>
                    <div class="mt-2">
                        
                        <p>{!! $message->content !!}</p>
                        
                        <div class="text-right">
                            @if (Auth::id() == $message->user_id)
                                {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                        
                    </div>
                </div>
               
    
            @endforeach
        @endif    
              
            
          
        {!! Form::model($messages, ['route' => 'messages.store']) !!}
        　
            <input name="delivery_id" type="hidden" value="{{ $delivery->id }}">
            <div class="form-group">
               
                {!! Form::label('content', 'コメント:') !!}
                {!! Form::text('content', null, ['class' => 'form-control']) !!}
            </div>
    
            {!! Form::submit('投稿', ['class' => 'btn btn-info']) !!}
    
        {!! Form::close() !!}
    </div>
        
@endsection