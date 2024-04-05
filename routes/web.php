<?php
session_start();

require_once('./routes/Router.php');
require_once('./middlewares/AuthMiddleware.php');
require_once('./controllers/HomeController.php');
require_once('./controllers/AuthController.php');

$router = new Router();

// Définir vos routes ici

$router->get('/', 'HomeController', 'index');

$router->get('/login', 'AuthController', 'showLogin');
$router->post('/login', 'AuthController', 'logUser');

$router->get('/register', 'AuthController', 'showRegister');
$router->post('/register', 'AuthController', 'registerUser');

$router->get('/logout', 'AuthController', 'logout');

$router->get('/profile', 'UserController', 'show', 'AuthMiddleware::handle');
