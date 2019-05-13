@extends('layouts.app')

@section('content')
    <h1>・ユーザー情報</h1>
    <div class="profile-wrapper border mb-5 px-3 py-3">
        <div class="Mypicture"></div>
        <h3>名前：{{ $user->name }}</h3>
         
       
        <!--コンテンツカラム追加-->
         <h3>私の説明：{{ $user->content }}</h3>
        
            @if (Auth::id() == $user->id)
                {!! link_to_route('users.edit', 'このプロフィールを編集', ['id' => $user->id], ['class' => 'btn btn-light']) !!}
                
              <!--ユーザー退会ボタン-->
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    {!! Form::submit('退会する', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            @endif
            
        <div class="w-25">
            @include('favorite_follow.favorite_button', ['user' => $user])
            
            <p>高評価： <span class="badge badge-secondary">{{ $count_followers }}</span></p>
            
        </div>
            
    </div>
    <div>
        <h1>・ユーザーの出品</h1>
        @if (count($deliveries) > 0)
            @include('deliveries.deliveries', ['deliveries' => $deliveries])
        @endif        
    </div>
                
    
              
@endsection