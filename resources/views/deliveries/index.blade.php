@extends('layouts.app')

@section('content')

    @if (session('flash_message'))
        <div class="alert alert-info" role="alert">
            {{ session('flash_message') }}
        </div>
    @endif
    
    
    @if (count($errors) > 0)
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        
   
    {!! Form::open(['method' => 'GET' , 'class' => 'row p-3']) !!}
                商品名 {!! Form::text('delivery_name', $delivery_name,['class' => 'border col-sm-3 mx-2 mb-2' ,'placeholder' => 'カレーライス']) !!}
                販売場所 {!! Form::text('delivery_place', $delivery_place,['class' => 'border col-sm-3 mx-2 mb-2' ,'placeholder' => '沖縄県那覇市']) !!}
                {!! Form::submit('検索',['class' => 'btn btn-light']) !!}
    {!! Form::close() !!}
  
        
    <div>
        <h1 class="text-center my-5">新着投稿一覧</h1>
        
        @include('deliveries.deliveries', ['deliveries' => $deliveries])
        
    </div>
     
     
        
        
@endsection
