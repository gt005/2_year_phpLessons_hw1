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
                        @auth
                            <form method="POST" action="{{ route('add_to_cart') }}" class="ms-1">
                                @csrf
                                <input name="id" type="hidden"  value="{{ $product->id }}" class="form-control" placeholder="Id">
                                <input name="name" type="hidden" value="{{ $product->name }}" class="form-control" placeholder="name">
                                <input name="price" type="hidden" value="{{ $product->price }}" class="form-control" placeholder="price">
                                <input name="quantity" type="hidden" value="1" class="form-control" placeholder="quantity">
                                <input type="submit" class="btn btn-outline-secondary category-header__buttons-block__button" value="В корзину">
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary category-header__buttons-block__button">Войдите, чтобы добавить в корзину</a>
                        @endauth
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
