@extends('layouts.app')

@section('content')
    
      <h1 class="text-center mb-3">商品：{{ $delivery->name }}</h1>
               
        <div class="mt-3 mb-3">
            <p> 販売場所<br>{{ $delivery->place }}</p>
            <p> 価格<br>{{$delivery->price }}</p>
            <p>商品の説名<br>{{$delivery->content }}</p>
       
                    
        @if (Auth::id() == $delivery->user_id)
            {!! Form::open(['route' => ['deliveries.destroy', $delivery->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! link_to_route('deliveries.edit', 'この出品を編集', ['id' => $delivery->id], ['class' => 'btn btn-light']) !!}
            {!! Form::close() !!}
        @endif
        </div>
                    
        
            {!! link_to_route('users.show', 'このユーザーについて', ['id' =>$delivery->user_id], ['class' => 'btn btn-light']) !!}     
                 
                    <!--コメント機能つける-->
                    
            
        
        
@endsection