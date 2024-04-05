<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $errorType ?></title>
</head>

<body>
    <h1><?= $errorCode ?></h1>
    <h2><?= $errorType ?></h2>
    <p><?= $errorMessage ?></p>
    <a href="<?= $link ?>">Retour</a>
</body>

</html>