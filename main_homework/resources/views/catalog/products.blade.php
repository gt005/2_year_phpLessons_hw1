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
                            @if(in_array($product->id, $raw_cart_items))

                                <input type="submit" disabled class="ms-3 btn btn-secondary category-header__buttons-block__button_disabled" value="В корзинe">
                            @else
                                <form class="ms-1 category-header__buttons-block__form">
                                    @csrf
                                    <input name="id" type="hidden"  value="{{ $product->id }}" class="form-control" placeholder="Id">
                                    <input name="name" type="hidden" value="{{ $product->name }}" class="form-control" placeholder="name">
                                    <input name="price" type="hidden" value="{{ $product->price }}" class="form-control" placeholder="price">
                                    <input name="quantity" type="hidden" value="1" class="form-control" placeholder="quantity">
                                    <input type="button" class="btn btn-outline-secondary category-header__buttons-block__button" value="В корзину">
                                </form>
                            @endif
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

        const csrfToken = document.querySelector('input[name="_token"]').getAttribute('value');

        let addToCartButtons = document.querySelectorAll('.category-header__buttons-block__form');
        console.log(addToCartButtons);
        for (let i = 0; i < addToCartButtons.length; i++) {

            addToCartButtons[i].querySelector('.category-header__buttons-block__button').onclick = function () {
                console.log(24)
                let id = this.parentNode.querySelector('input[name="id"]').value;
                let name = this.parentNode.querySelector('input[name="name"]').value;
                let price = this.parentNode.querySelector('input[name="price"]').value;
                let quantity = this.parentNode.querySelector('input[name="quantity"]').value;

                let formData = new FormData();
                formData.append('id', id);
                formData.append('name', name);
                formData.append('price', price);
                formData.append('quantity', quantity);
                formData.append('_token', csrfToken);


                fetch("{{ route('add_to_cart') }}", {
                    method: 'POST',
                    mode: 'same-origin',  // Do not send CSRF token to another domain.
                    body: formData
                }).then(function (response) {
                    if (!response.ok) {
                        return false
                    }
                    // добавить атрибут disabled кнопке "В корзину" и изменить текст на "В корзине" (см. макет)
                    addToCartButtons[i].querySelector('.category-header__buttons-block__button').disabled = true;
                    addToCartButtons[i].querySelector('.category-header__buttons-block__button').value = 'В корзине';
                    addToCartButtons[i].querySelector('.category-header__buttons-block__button').classList.remove('btn-outline-secondary');
                    addToCartButtons[i].querySelector('.category-header__buttons-block__button').classList.add('btn-secondary');
                });
            }
        }

    }
</script>
