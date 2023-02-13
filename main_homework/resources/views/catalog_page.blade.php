@extends('layout.index')

@section('links')
    <link rel="stylesheet" href="/css/catalog_page.css">
@endsection

@section('content')

    <div class="category-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="category-header__header">
                        @if ($activeCategory != null)
                            {{ $activeCategory->name }}
                        @else
                            Все товары
                        @endif
                    </h1>
                    <p class="category-header__description">
                        @if ($activeCategory != null)
                            {{ $activeCategory->description }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="category-header__buttons-block">
                        @if(!$activeCategory)
                            <p>Категории:</p>
                            @foreach($categories as $category)
                                <a href="{{ route('index', $category->name) }}" type="button" class="btn btn-outline-secondary category-header__buttons-block__button">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        @else
                            <p>Подкатегории:</p>
                            @foreach($categories as $category)
                                <a href="{{ route('index', $category->name) }}" type="button" class="btn btn-outline-secondary category-header__buttons-block__button">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="catalog-products">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="catalog-products__search-block">
                        <form class="catalog-products__header__search-block__search-input">
                            <input name="search_text" type="text" class="form-control" placeholder="Поиск">
                            <input name="search_button" type="submit" class="btn btn-outline-secondary category-header__buttons-block__button" value="Поиск">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
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
                                        <p>{{ $product->price }} руб.</p>
                                    </div>
                                    <div class="catalog-products__cards-table__card__container__button">
                                        <a href="" type="button" class="btn btn-outline-secondary category-header__buttons-block__link">
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
            </div>
        </div>
    </div>


@endsection
