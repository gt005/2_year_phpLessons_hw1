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
                        {{ $activeCategory->name }}
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
                        <p>Категории:</p>
                        @foreach($categories as $category)
                            <a href="{{ route('category', ['category' => $category->name]) }}" type="button" class="btn btn-outline-secondary category-header__buttons-block__button">
                                {{ $category->name }}
                            </a>
                        @endforeach
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
                        <form method="get" action="{{ route('search') }}" class="catalog-products__header__search-block__search-input">
                            <input name="search_text" type="text" class="form-control" placeholder="Поиск">
                            <input name="search_button" type="submit" class="btn btn-outline-secondary category-header__buttons-block__button" value="Поиск">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @include('catalog.products')
            </div>
        </div>
    </div>


@endsection
