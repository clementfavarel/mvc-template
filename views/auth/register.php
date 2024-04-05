<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/auth.css">
</head>

<body>
    <div class="card">
        <img src="./assets/img/logo-app" alt="Logo App" class="logo">
        <form action="/register" method="post">
            <div class="input-group">
                <label for="firstname" class="label">Prénom(s)</label>
                <input type="text" name="firstname" id="firstname" class="input" required>
            </div>
            <div class="input-group">
                <label for="lastname" class="label">Nom</label>
                <input type="text" name="lastname" id="lastname" class="input" required>
            </div>
            <div class="input-group">
                <label for="email" class="label">Email</label>
                <input type="email" name="email" id="email" class="input" required>
            </div>
            <div class="input-group">
                <label for="pwd" class="label">Mot de passe</label>
                <input type="password" name="pwd" id="pwd" class="input" required>
            </div>
            <div class="input-group">
                <label for="confirm-pwd" class="label">Confirmer le mot de passe</label>
                <input type="password" name="confirm-pwd" id="confirm-pwd" class="input" required>
            </div>
            <button type="submit" class="btn">Inscription</button>
        </form>
    </div>
</body>

</html>