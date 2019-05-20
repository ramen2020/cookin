@extends('layouts.app')

@section('content')

<div class="blade1">

     <h1 class="text-center my-5">出品編集</h1>

    <div class="profile-wrapper mx-auto">
        
         {!! Form::model($delivery, ['route' => ['deliveries.update', $delivery->id], 'method' => 'put','enctype' => 'multipart/form-data']) !!}
         
          <h6>出品画像</h6>
         <input type="file" name="file" class="mb-3">
         
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
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
             {!! Form::submit('更新', ['class' => 'btn btn-info']) !!}
             
        {!! Form::close() !!}
    </div>
</div>

@endsection