<?php

class AuthMiddleware
{
    public static function handle()
    {
        // Vérifie si l'utilisateur est connecté
        // Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion ou on renvoie une réponse d'erreur
        // Sinon, on laisse le traitement de la route continuer
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }
    }
}
