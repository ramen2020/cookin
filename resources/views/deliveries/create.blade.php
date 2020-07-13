@extends('layouts.app')

@section('content')

    <div class="blade1">
        <h1 class="text-center mb-5">新規出品ページ</h1>
        <div class="row pb-5">
            <div class="col-sm-5 mx-auto">
                <!--画像アップロード-->
                {!! Form::model($delivery, ['route' => ['deliveries.store'], 'method' => 'post' ,'enctype' => 'multipart/form-data']) !!}
                    <input type="file" name="file" class="mb-3">
                    <div class="form-group">
                        {!! Form::label('name', '商品名') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'カレーライス']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('place', '場所') !!}
                        {!! Form::text('place', null, ['class' => 'form-control', 'placeholder' => '京都府京都市伏見区']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('price', '価格') !!}
                        {!! Form::text('price', null, ['class' => 'form-control','placeholder' => '500']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', '商品情報') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control','placeholder' => '１０種類のスパイスを三時間かけて煮込んで作りました！']) !!}
                    </div>
                    {!! Form::submit('出品する', ['class' => 'btn btn-info text-center mt-3']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
