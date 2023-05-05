<?php
require_once '../vendor/autoload.php';
session_start();

use Philo\Blade\Blade;
use Donatorm\Ud52\Login;

$_SESSION['user'] = 'invitado';
if (isset($_POST['login'])) {
    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);
    unset($_POST['login']);
    unset($_POST['user']);
    unset($_POST['pass']);
    if ($user !== '' && $pass !== '') {
        $objLogin = new Login();
        if ($objLogin->validateLogin($user, $pass)) {
            $_SESSION['user'] = $user;
            header('Location: listing.php');
            die();
        }
    }
}

$views = '../views';
$cache = '../cache';
$viewLogin = new Blade($views, $cache);
$tittle = 'Login';
echo $viewLogin->view()->make('viewLogin', compact('tittle'))->render();
