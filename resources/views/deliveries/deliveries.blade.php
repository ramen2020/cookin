<ul class="list-unstyled row">
    @foreach ($deliveries as $delivery)
        <li class="border col-md-2 pt-2 pb-4 mr-4 mb-2 rounded">
            
            <img src="{{ $delivery->img }}" class="w-100 h-50 text-center rounded">
            
            <div class="mt-3 mb-1">
                <h6> 商品<br>{!! $delivery->name !!}</h6>
                <h6> 販売場所<br>{!! $delivery->place !!}</h6>
                {!! link_to_route('deliveries.show', '詳しく見る', ['id' => $delivery->id], ['class' => 'btn btn-light']) !!}

            </div>

        </li>
    @endforeach
</ul>
{{ $deliveries->render('pagination::bootstrap-4') }}