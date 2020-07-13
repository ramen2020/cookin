@if (count($deliveries) > 0)
    <ul class="list-unstyled delivery-ul">
        @foreach ($deliveries as $delivery)
            <li class="border p-2 delivery-li">
                <div class="img-cover">
                    <img src="{{ $delivery->img }}" class="delivery-img">
                </div>
                <div class="my-content-wrapper delivery-font">
                    <p> 商品<br>{!! $delivery->name !!}</p>
                    <p> 販売場所<br>{!! $delivery->place !!}</p>
                    {!! link_to_route('deliveries.show', '詳しく見る', ['id' => $delivery->id], ['class' => 'btn btn-light']) !!}
                </div>
            </li>
        @endforeach
    </ul>
    {{ $deliveries->render('pagination::bootstrap-4') }}
@else
    <p class="text-center">ー 出品が見つかりませんでした ー</p>
@endif