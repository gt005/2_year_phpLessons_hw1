<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/bootstrap5-3-0.min.css">
    @yield('links')
    <title>Обувной магазин</title>
</head>
<body>
<header>
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100">
                    <li class="nav-item">
                        <a class="nav-link @yield('header-link-active_catalog')" aria-current="page" href="{{ route('index') }}">Каталог</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link @yield('header-link-active_cart')" href="{{ route('cart_page') }}">Корзина</a>
                        </li>
                    @endauth
                    @role('Admin')
                        <li class="nav-item">
                            <a class="nav-link @yield('header-link-active_users')" href="{{ route('users.index') }}">Пользователи</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @yield('header-link-active_order_list')" href="{{ route('order_list') }}">Заказы</a>
                        </li>

                    @endrole
                    <li class="nav-item ms-auto">
                        <a class="nav-link @yield('header-link-active_profile')" href="{{ route('profile') }}">Личный кабинет</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    @yield('content')
</main>

<script src="/js/bootstrap5-3-0.min.js"></script>
</body>
</html>
