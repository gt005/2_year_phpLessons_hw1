<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<ul>
    @foreach($categories as $category)
        <li>
            <p>
                {{ $category->name }}
            </p>
        </li>

        @endforeach
</ul>

<h1>Далее подкатегории для первой категории</h1>
    @foreach($categories[0]->subcategories as $sub)
        <p>
            {{ $sub->name }}
        </p>
    @endforeach


</body>
</html>
