      
        <h3 class="text-center mt-5 mb-5">コメント一覧</h3>
         @if (count($messages) > 0)
           @foreach ($messages as $message)
                <div class="border-top p-4">
                    <div class="d-flex">
                        <p class="mr-3">名前：{{ $message->user_id }}</p>
                        <time class="text-secondary">
                            {{ $message->created_at->format('Y.m.d H:i') }}
                        </time>
                    </div>
                    <div class="mt-2">
                        
                        <p>{!! $message->content !!}</p>
                        
                        <div class="text-right">
                            @if (Auth::id() == $message->user_id)
                                {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                        
                    </div>
                </div>
            @endforeach
        @endif    
              {{ $messages->render('pagination::bootstrap-4') }}