<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="{{$metaDescription ?? 'meta_description'}}">
    <title>CSS - {{ $title ?? '' }}</title>
</head>
<body>
    <x-layouts.navigation />

    {{ $slot }}
    {{ $sum }}
    
</body>
</html>