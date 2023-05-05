<?php
require_once '../vendor/autoload.php';
session_start();

use Philo\Blade\Blade;
use \Donatorm\Ud52\Products;

if (isset($_POST['login'])) {
    unset($_POST['login']);
    session_unset();
    header('Location: login.php');
    die();
}

$delete = 'not';
$objProducts = new Products();

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    unset($_POST['delete']);
    $objProducts->deleteProduct($id);
    $delete = 'ok';
}

$listProducts = $objProducts->getListProducts();

if (isset($_POST['detail'])) {
    $_SESSION['id'] = $_POST['detail'];
    unset($_POST['detail']);
    header('Location: detail.php');
    die();
}
if (isset($_POST['update'])) {
    $_SESSION['id'] = $_POST['update'];
    unset($_POST['update']);
    header('Location: update.php');
    die();
}

$views = '../views';
$cache = '../cache';

$viewListing = new Blade($views, $cache);
$tittle = 'Listado';
$header = 'Gestión de Productos';
echo $viewListing->view()->make('viewListing', compact('tittle', 'header', 'listProducts', 'delete'))->render();
