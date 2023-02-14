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
        @include('orderListComponent', ['orders' => $orders])
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
