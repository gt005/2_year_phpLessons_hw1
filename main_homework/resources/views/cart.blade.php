@extends('layout.index')

@section('header-link-active_cart')active @endsection

@section('content')
    <link rel="stylesheet" href="/css/products_list.css">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5">Корзина</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @foreach($cart_items as $cart_item)
                    @if($cart_item == null)
                        @continue
                    @endif
                    <div class="order-item">
                        <div class="order-item__product">
                            <div class="order-item__product__image">
                                <img src="{{ $cart_item['object']->image }}" alt="">
                            </div>
                            <div class="order-item__product__info">
                                <div class="order-item__product__info__name">
                                    <a href="{{ route('product', ['product' => $cart_item['object']->id]) }}">{{ $cart_item['object']->name }}</a>
                                    <p>Количество: {{ $cart_item['cart_item']->quantity }}</p>
                                </div>
                                <div class="order-item__product__info__price">
                                    <p>Цена за шт: <span class="price-number-to-change">{{ $cart_item['object']->price }}</span> руб.</p>
                                    <p>Сумма за {{ $cart_item['cart_item']->quantity }} шт: <span class="price-number-to-change">{{ $cart_item['object']->price * $cart_item['cart_item']->quantity }}</span> руб.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('add_to_cart') }}" class="mb-3">
        @csrf
        <input name="id" type="text" class="form-control" placeholder="Id">
        <input name="name" type="text" class="form-control" placeholder="name">
        <input name="price" type="number" class="form-control" placeholder="price">
        <input name="quantity" type="number" class="form-control" placeholder="quantity">
        <input type="submit">
    </form>

    <script>
        function numFormat(num) {
            return num.toString().replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
        }

        window.onload = function () {

            let prices = document.querySelectorAll('.price-number-to-change');

            for (let i = 0; i < prices.length; i++) {

                let text = prices[i].innerHTML;

                let arr = text.split(' ');

                arr[0] = numFormat(arr[0]);
                text = arr.join(' ');

                prices[i].textContent = text;
            }
        }
    </script>
@endsection
