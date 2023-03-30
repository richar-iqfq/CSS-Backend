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
    <h1><?= e($title) ?></h1> <?php // sintaxis alternativa de php?>

    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo e($user) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>