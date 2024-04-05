<?php
require_once('./controllers/Controller.php');

class AuthController extends Controller
{
    public function view($view, $data = [])
    {
        extract($data);
        require_once('./views/auth/' . $view . '.php');
    }

    public function showLogin()
    {
        $this->view('login');
    }

    public function logUser()
    {
        // Vérifier les données du formulaire
        // Si les données sont valides
        // Authentifier l'utilisateur
        // Rediriger l'utilisateur vers la page d'accueil
        // Sinon
        // Rediriger l'utilisateur vers la page de connexion
    }

    public function showRegister()
    {
        $this->view('register');
    }

    public function registerUser()
    {
        // Vérifier les données du formulaire
        // Si les données sont valides
        // Créer un nouvel utilisateur
        // Authentifier l'utilisateur
        // Rediriger l'utilisateur vers la page d'accueil
        // Sinon
        // Rediriger l'utilisateur vers la page d'inscription
    }

    public function logout()
    {
        // Déconnecte l'utilisateur
        session_destroy();
        // Rediriger l'utilisateur vers la page d'accueil
        header('Location: /');
    }
}
