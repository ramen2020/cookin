@extends('layouts.app')

@section('content')
    <div class="row">
        <h1>マイプロファイルへんしゅうがめん</h1>
        <div class="profile-wrapper">
            <div class="Mypicture"></div>
             {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
             
                <div class="form-group">
                        {!! Form::label('name', '名前:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('content', '簡単な自己紹介:') !!}
                        {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>            
                <div class="form-group">
                        {!! Form::label('email', 'メアド:') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>  
                 {!! Form::submit('更新', ['class' => 'btn btn-light']) !!}
                 
            {!! Form::close() !!}
        </div>
    </div>
@endsection