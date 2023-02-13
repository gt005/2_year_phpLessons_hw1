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
                    <div class="catalog-products__cards-table__card__container__button">
                        <a href="{{ route('product', ['product' => $product->id]) }}" type="button" class="btn btn-outline-secondary category-header__buttons-block__link">
                            Подробнее
                        </a>
                        <a href="" type="button" class="btn btn-outline-secondary category-header__buttons-block__button">
                            В корзину
                        </a>
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
