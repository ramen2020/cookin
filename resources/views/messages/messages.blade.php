<div class="text-center mt-5 mb-5">
    <h3 class="mb-3">コメント一覧</h3>
    <p class="text-center">ー 商品情報・交渉 ー</p>
</div>
@if (count($messages) > 0)
    @foreach ($messages as $message)
        <div class="border-top p-4">
            <div>
                <time class="text-secondary">
                    {{ $message->created_at->format('Y.m.d H:i') }}
                </time>
                <p>>{{ $message->user->name }}</p>

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