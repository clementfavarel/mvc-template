<?php
require_once('./routes/web.php');

$uri = $_SERVER['REQUEST_URI'];
$router = new Router();
