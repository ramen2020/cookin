@extends('layouts.app')

@section('content')

    
        
        <h1 class="text-center my-5">プロフィール</h1>
        
        
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put' ,'enctype' => 'multipart/form-data']) !!}
             
                <h6 class="pl-3">プロフィール画像</h6>
                <input type="file" name="file" class="mb-3">
             
                <div class="form-group col-sm-10">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
               <div class="form-group col-sm-10">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    
                </div> 
                
                <div class="form-group col-sm-12">
                    {!! Form::label('content', '簡単な自己紹介') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>            
  
                 {!! Form::submit('変更する', ['class' => 'btn btn-light ml-4']) !!}
                 
            {!! Form::close() !!}
        </div>
   
    

@endsection