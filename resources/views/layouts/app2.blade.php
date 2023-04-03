<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="@yield('meta_description', 'meta_description')">
    <title>CSS - @yield('title')</title>
</head>
<body>
    @include('partials.navigation')

    @yield('content')

</body>
</html>