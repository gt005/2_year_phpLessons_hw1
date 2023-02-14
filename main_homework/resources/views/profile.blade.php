@extends('layouts.app')

@section('header-link-active_profile')active @endsection

@section('content')
    <link rel="stylesheet" href="/css/products_list.css">

<div class="container my-5">
    <div class="row">
        <div class="col-12 d-flex justify-content-between ">
            <h1 class="profile-name">
                Добро пожаловать, {{ Auth::user()->name }}
            </h1>
            <div class="profile-logout d-flex align-items-center">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Выйти
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <h3>Список заказов</h3>
        </div>
    </div>
    @if(count($orders) == 0)
        <h5>Заказов нет</h5>
    @else
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
