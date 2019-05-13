@extends('layouts.app')

@section('content')
    
      <h1 class="text-center mb-3">新着投稿一覧</h1>
        @include('deliveries.deliveries', ['deliveries' => $deliveries])
        
        
@endsection
