@extends('layouts.app')

@section('content')
    <div class="blade1">
        <div class="text-center mb-5">
            <h1 class="font-weight-bold">ログイン</h1>
        </div>
    
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
    
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
    
                    {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
    
            </div>
        </div>
    </div>
@endsection