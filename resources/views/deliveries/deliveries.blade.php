<ul class="list-unstyled row p-2">
    @foreach ($deliveries as $delivery)
        <li class="border col-md-2 pt-2 pb-5 mr-2 mb-2 rounded">
            
            <img src="{{ $delivery->img }}" class="w-100 h-50 text-center rounded">
            
            <div class="mt-3 mb-1">
                <p> 商品<br>{!! $delivery->name !!}</p>
                <p> 販売場所<br>{!! $delivery->place !!}</p>
                {!! link_to_route('deliveries.show', '詳しく見る', ['id' => $delivery->id], ['class' => 'btn btn-light']) !!}

            </div>

        </li>
    @endforeach
</ul>
{{ $deliveries->render('pagination::bootstrap-4') }}