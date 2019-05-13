<ul class="list-unstyled row">
    @foreach ($deliveries as $delivery)
        <li class="border mr-2 mb-3 col-md-2">
            <div class="mt-3 mb-3">
                <p> 商品<br>{!! nl2br(e($delivery->name)) !!}</p>
                <p> 販売場所<br>{!! nl2br(e($delivery->place)) !!}</p>
                <p> 価格<br>{!! nl2br(e($delivery->price)) !!}</p>
               
                
                {!! link_to_route('deliveries.show', '詳しく見る', ['id' => $delivery->id], ['class' => 'btn btn-light']) !!}
                
            </div>

        </li>
    @endforeach
</ul>
{{ $deliveries->render('pagination::bootstrap-4') }}