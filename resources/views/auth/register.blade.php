@extends('layouts.app')

@section('content')
    <div class="blade1">
        <div class="text-center">
            <h1 class="font-weight-bold mb-5">新規登録</h1>
        </div>
    
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
    
                {!! Form::open(['route' => 'signup.post']) !!}
                    <div class="form-group">
                        {!! Form::label('name', '名前') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::label('email', 'メールアドレス') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'パスワード確認') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', '簡単な自己紹介') !!}
                        {!! Form::textarea('content',  old('content'), ['class' => 'form-control']) !!}
                    </div>
    
                    {!! Form::submit('新規登録', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
@endsection
