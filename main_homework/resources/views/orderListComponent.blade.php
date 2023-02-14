<div class="row">
    <div class="col-12">
        <div class="order-list">
            @foreach($orders as $order)
                <div class="order-item">
                    <div class="order-list__order-info">
                        <div class="order-list__order-info__order-date-number">
                            Дата заказа: {{ date('j F, Y', strtotime($order->order_date)) }} <br>
                            Номер: <strong>{{ $order->order_number }}</strong>
                        </div>
                        <div class="order-list__order-info__order-total">
                            Сумма заказа: <strong class="price-number-to-change">{{ $order->getTotalOrderSum() }}</strong> руб.
                        </div>
                    </div>
                    <p>Список товаров: </p>
                    @foreach($order->orderItems as $item)
                        <div class="order-item__product">
                            <div class="order-item__product__image">
                                <img src="{{ $item->product->image }}" alt="">
                            </div>
                            <div class="order-item__product__info">
                                <div class="order-item__product__info__name">
                                    <a href="{{ route('product', ['product' => $item->product->id]) }}">{{ $item->product->name }}</a>
                                    <p>Количество: {{ $item->amount }}</p>
                                </div>
                                <div class="order-item__product__info__price">
                                    <p>Цена за шт: <span class="price-number-to-change">{{ $item->product->price }}</span> руб.</p>
                                    <p>Сумма за {{ $item->amount }} шт: <span class="price-number-to-change">{{ $item->product->price * $item->amount }}</span> руб.</p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            @endforeach
        </div>
    </div>
</div>
