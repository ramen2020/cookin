@extends('layouts.app')

@section('content')
    
    <div class="mb-5 p-3">
        <h1 class="text-center mt-5">{{ $user->name }}</h1>
         <p class="text-center">いいね数： <span class="badge badge-light">{{ $count_followers }}</span></p>
        <div class="Mypicture">
            @if($user->user_picture)
              <img src="{{ $user->user_picture }}" class="user-img">
             @else
                <div class="no-image">
                     <h3 class="no-image-font">NO IMAGE</h3>
                </div>
            @endif
        </div>
      
         <div class="my-content-wrapper">
            <h5 class="my-4">簡単な自己紹介</h5>
            <p class="mb-5 pb-5">{!! nl2br(e( $user->content )) !!}</p>
                       @if (Auth::id() == $user->id)
                    
                        {!! link_to_route('users.edit', 'このプロフィールを編集', ['id' => $user->id], ['class' => 'btn btn-light']) !!}
                    
                    <div class="d-flex justify-content-end">
                        <div>
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                            {!! Form::submit('退会する', ['class' => 'btn btn-danger btn-sm mt-3']) !!}
                        {!! Form::close() !!}
                        </div>
                    </div>
            
            @endif
            
            @include('favorite_follow.favorite_button', ['user' => $user])
         </div>
            
    </div>
    <div class="pt-5 mb-5">
        <h3 class="text-center my-5">ユーザーの出品</h3>
        
            @if (count($deliveries) > 0)
                @include('deliveries.deliveries', ['deliveries' => $deliveries])
            @else
                <p class=text-center>ー 只今、出品準備中です ー</p>
            @endif 
            
           
    </div>
                
    
              
@endsection