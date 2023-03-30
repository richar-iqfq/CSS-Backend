<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>
<body>
    <h1><?php echo e($title) ?></h1>
    <h1>{{ $title }}</h1> <?php // sintaxis alternativa de php?>

    @if (! empty($users))
        <ul>
            @foreach ($users as $user)
                <li>{{ $user }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay usuarios registrados.</p>
    @endif

    <br>
    <a href="/usuarios/nuevo">Crear Nuevo Usuario</a>
</body>
</html>