@extends('layouts.app')

@section('content')
    
    <div class="profile-wrapper border mb-5 p-3">
        <h1 class="text-center mt-5 mb-4">{{ $user->name }}</h1>
        <div class="Mypicture text-center">
          <img src="{{ $user->user_picture }}" class="w-75 h-75 my-5">
        </div>
         
         <h3>簡単な自己紹介：{{ $user->content }}</h3>
        
            @if (Auth::id() == $user->id)
                {!! link_to_route('users.edit', 'このプロフィールを編集', ['id' => $user->id], ['class' => 'btn btn-light']) !!}
                
              <!--ユーザー退会ボタン-->
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    {!! Form::submit('退会する', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            @endif
            
        <div class="d-flex">
            @include('favorite_follow.favorite_button', ['user' => $user])
             <p class="ml-3 mt-2">高評価： <span class="badge badge-secondary">{{ $count_followers }}</span></p>
        </div>
            
    </div>
    <div class="border mb-4 p-3">
        <h1 class="text-center mt-5 mb-5">出品一覧</h1>
        
            @if (count($deliveries) > 0)
                @include('deliveries.deliveries', ['deliveries' => $deliveries])
            @else
                <p class=text-center>ー只今、出品準備中です。ー</p>
            @endif 
            
            {{ $deliveries->render('pagination::bootstrap-4') }}
    </div>
                
    
              
@endsection