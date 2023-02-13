<div class="col-12">
    <div class="catalog-products__cards-table">
        @foreach($products as $product)
            <div class="catalog-products__cards-table__card">
                <div class="catalog-products__cards-table__card__container__image">
                    <img src="{{ $product->image }}" alt="">
                </div>
                <div class="catalog-products__cards-table__card__container">
                    <div class="catalog-products__cards-table__card__container__name">
                        <p>{{ $product->name }}</p>
                    </div>
                    <div class="catalog-products__cards-table__card__container__price">
                        <p class="product-price">{{ $product->price }} руб.</p>
                    </div>
                    <div class="catalog-products__cards-table__card__container__button d-flex">
                        <a href="{{ route('product', ['product' => $product->id]) }}" type="button" class="btn btn-outline-secondary category-header__buttons-block__link">
                            Подробнее
                        </a>
                        @auth
                            <form method="POST" action="{{ route('add_to_cart') }}" class="ms-1">
                                @csrf
                                <input name="id" type="hidden"  value="{{ $product->id }}" class="form-control" placeholder="Id">
                                <input name="name" type="hidden" value="{{ $product->name }}" class="form-control" placeholder="name">
                                <input name="price" type="hidden" value="{{ $product->price }}" class="form-control" placeholder="price">
                                <input name="quantity" type="hidden" value="1" class="form-control" placeholder="quantity">
                                <input href="" type="submit" class="btn btn-outline-secondary category-header__buttons-block__button" value="В корзину">
                            </form>
                        @else
                            <a href="{{ route('login') }}" type="button" class="btn btn-outline-secondary category-header__buttons-block__button ms-1">
                                В корзину
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function numFormat(num) {
        return num.toString().replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
    }

    window.onload = function () {

        let prices = document.querySelectorAll('.product-price');

        for (let i = 0; i < prices.length; i++) {

            let text = prices[i].innerHTML;

            let arr = text.split(' ');

            arr[0] = numFormat(arr[0]);
            text = arr.join(' ');

            prices[i].textContent = text;
        }
    }
</script>
