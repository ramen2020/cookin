@extends('layouts.app')

@section('content')
    <div class="row">
        <h1>マイプロファイルへんしゅうがめん</h1>
        <div class="profile-wrapper">
            <div class="Mypicture"></div>
             {!! Form::model($delivery, ['route' => ['deliveries.update', $delivery->id], 'method' => 'put']) !!}
             
                <div class="form-group">
                    {!! Form::label('name', '商品名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('place', '場所:') !!}
                    {!! Form::text('place', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('price', '価格:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('content', '商品説明:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                 {!! Form::submit('更新', ['class' => 'btn btn-light']) !!}
                 
            {!! Form::close() !!}
        </div>
    </div>
@endsection