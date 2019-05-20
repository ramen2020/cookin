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
        
   <!--検索機能-->
    {!! Form::open(['method' => 'GET' , 'class' => 'row p-3']) !!}
                商品名 {!! Form::text('delivery_name', $delivery_name,['class' => 'border col-sm-3 ml-2 mr-4 mb-2' ,'placeholder' => 'カレーライス']) !!}
                販売場所 {!! Form::text('delivery_place', $delivery_place,['class' => 'border col-sm-3 ml-2 mb-2' ,'placeholder' => '沖縄県那覇市']) !!}
                {!! Form::submit('検索',['class' => 'btn btn-light']) !!}
    {!! Form::close() !!}
  
    <div>
        <h3 class="text-center my-5 pt-5" style="font-weight:bold;">新着投稿一覧</h3>
        
        @include('deliveries.deliveries', ['deliveries' => $deliveries])
        
    </div>

     
     
        
        
@endsection
