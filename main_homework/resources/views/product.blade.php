@extends('layout.index')

@section('links')
    <link rel="stylesheet" href="/css/product.css">
@endsection
@section('content')
    <div class="product-cont">
        <div class="container">
            <div class="row">
                <div class="offset-1 col-4">
                    <div class="product-cont__product-img">
                        <img src="{{ $product->image }}" alt="">
                    </div>
                </div>
                <div class="offset-1 col-5">
                    <div class="product-cont__product-info">
                        <h1>{{ $product->name }}</h1>
                        <p id="productPrice">{{ $product->price }} руб</p>
                        <a href="" class="btn btn-outline-secondary">В корзину</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-description-cont">
        <div class="container">
            <div class="row">
                <div class="offset-1 col-10">
                    <h3 class="product-description-cont__header">Описание</h3>
                    <div class="product-description-cont__text">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function numFormat(num) {
            return num.toString().replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
        }

        window.onload = function () {

            let prices = document.querySelectorAll('#productPrice');

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
