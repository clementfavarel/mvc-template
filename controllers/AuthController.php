<?php
require_once('./controllers/Controller.php');
require_once('./helpers/InputValidation.php');
require_once('./models/UserModel.php');

class AuthController extends Controller
{
    private $InputValidation;
    private $UserModel;

    public function __construct()
    {
        $this->InputValidation = new InputValidation();
        $this->UserModel = new UserModel();
    }

    public function viewAuth($view, $data = [])
    {
        extract($data);
        require_once('./views/auth/' . $view . '.php');
    }

    public function showLogin()
    {
        $this->viewAuth('login');
    }

    public function logUser()
    {
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        $email = $this->trimData($email);
        $pwd = $this->trimData($pwd);

        if ($this->InputValidation->isEmpty($email) || $this->InputValidation->isEmpty($pwd)) {
            $this->showError("400", "Bad Request", "Veuillez remplir les champs.", "/login");
            return;
        }

        if (!$this->InputValidation->validateEmail($email)) {
            $this->showError("400", "Bad Request", "Veuillez saisir une adresse email valide.", "/login");
            return;
        }

        if (!$this->InputValidation->validatePwd($pwd)) {
            $this->showError("400", "Bad Request", "Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.", "/login");
            return;
        }

        $user = $this->UserModel->findByEmail($email);
        if (!$user) {
            $this->showError("404", "Not Found", "Cet utilisateur n'existe pas.", "/login");
            return;
        }

        // Which one should I use?
        // $pwdCorrect = password_verify($pwd, $user->pwd);
        $pwdCorrect = password_verify($pwd, $user['pwd']);
        if (!$pwdCorrect) {
            $this->showError("401", "Unauthorized", "Mot de passe incorrect.", "/login");
            return;
        }

        $_SESSION['user'] = $user;
        header('Location: /profile');
    }

    public function showRegister()
    {
        $this->viewAuth('register');
    }

    public function registerUser()
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $pwdConfirm = $_POST['confirm-pwd'];

        $firstname = $this->trimData($firstname);
        $lastname = $this->trimData($lastname);
        $email = $this->trimData($email);
        $pwd = $this->trimData($pwd);
        $pwdConfirm = $this->trimData($pwdConfirm);

        if ($this->InputValidation->isEmpty($firstname) || $this->InputValidation->isEmpty($lastname) || $this->InputValidation->isEmpty($email) || $this->InputValidation->isEmpty($pwd) || $this->InputValidation->isEmpty($pwdConfirm)) {
            $this->showError("400", "Bad Request", "Veuillez remplir les champs.", "/register");
            return;
        }

        if (!$this->InputValidation->validateName($firstname)) {
            $this->showError("400", "Bad Request", "Le prénom doit contenir uniquement des lettres.", "/register");
            return;
        }

        if (!$this->InputValidation->validateName($lastname)) {
            $this->showError("400", "Bad Request", "Le nom doit contenir uniquement des lettres.", "/register");
            return;
        }

        if (!$this->InputValidation->validateEmail($email)) {
            $this->showError("400", "Bad Request", "Veuillez saisir une adresse email valide.", "/register");
            return;
        }

        if (!$this->InputValidation->validatePwd($pwd) && !$this->InputValidation->validatePwd($pwdConfirm)) {
            $this->showError("400", "Bad Request", "Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.", "/register");
            return;
        }

        if ($pwd !== $pwdConfirm) {
            $this->showError("400", "Bad Request", "Les mots de passe ne correspondent pas.", "/register");
            return;
        }

        $user = $this->UserModel->findByEmail($email);
        if ($user) {
            $this->showError("409", "Conflict", "Cet utilisateur existe déjà.", "/register");
            return;
        }

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $this->UserModel->create($firstname, $lastname, $email, $hashedPwd);
        header('Location: /login');
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
}
