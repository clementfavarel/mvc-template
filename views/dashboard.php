<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./assets/css/global.css">
</head>

<body>
    <h1>Dashboard</h1>
    <?= $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] ?>
</body>

</html>