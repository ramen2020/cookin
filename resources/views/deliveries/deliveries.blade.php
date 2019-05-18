 @if (count($deliveries) > 0)
<ul class="list-unstyled row p-2 mb-5">
   
        @foreach ($deliveries as $delivery)
        <li class="col-md-3 pt-2 pb-2  mb-2 rounded">
            
            <img src="{{ $delivery->img }}" class="img111 w-75 h-75 text-center rounded">
            
            <div class="mt-3 mb-1">
                <p> 商品<br>{!! $delivery->name !!}</p>
                <p> 販売場所<br>{!! $delivery->place !!}</p>
                {!! link_to_route('deliveries.show', '詳しく見る', ['id' => $delivery->id], ['class' => 'btn btn-light']) !!}

            </div>

        </li>
        @endforeach

    
 
</ul>
    @else
        <p class="text-center">ー 出品が見つかりませんでした ー</p>
    @endif
{{ $deliveries->render('pagination::bootstrap-4') }}