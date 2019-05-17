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
        
    
      <h1 class="text-center my-5">新着投稿一覧</h1>
        @include('deliveries.deliveries', ['deliveries' => $deliveries])
        
        
@endsection
