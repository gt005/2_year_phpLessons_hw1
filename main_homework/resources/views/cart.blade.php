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
                @if(count($cart_items) == 0)
                    <h2>Ваша корзина пуста</h2>
                @endif
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
                                <div class="d-flex align-items-center ms-auto me-5">
                                    <form method="POST" action="{{ route('remove_from_cart') }}">
                                        @csrf
                                        <input name="id" type="hidden"  value="{{ $cart_item['object']->id }}" class="form-control" placeholder="Id">
                                        <input type="submit" class="btn btn-outline-secondary category-header__buttons-block__button" value="Удалить из корзины">
                                    </form>
                                    <form method="POST" action="{{ route('change_amount_in_cart') }}" class="ms-4">
                                        @csrf
                                        <input name="id" type="hidden"  value="{{ $cart_item['object']->id }}" class="form-control" placeholder="Id">
                                        <input name="quantity" type="number" min="1" max="999" value="{{ $cart_item['cart_item']->quantity }}" class="form-control mb-2" placeholder="name">
                                        <input type="submit" class="btn btn-outline-secondary category-header__buttons-block__button" value="Изменить количество">
                                    </form>
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
        @if(count($cart_items) != 0)
            <div class="row mb-5">
                <div class="col-12">
                    <div class="me-5">
                        <h2>Итого: <span class="price-number-to-change">{{ $cart_total }}</span> руб.</h2>
                        <form method="POST" action="{{ route('submit_order') }}">
                            @csrf
                            <input type="submit" class="btn btn-outline-secondary category-header__buttons-block__button" value="Подтвердить заказ">
                        </form>
                    </div>
                </div>
            </div>
        @endif

    </div>


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
