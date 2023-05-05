<?php
require_once '../vendor/autoload.php';
session_start();

use Philo\Blade\Blade;
use Donatorm\Ud52\Products;
use Donatorm\Ud52\Families;

$objFamilies = new Families();
$tableFamilies = $objFamilies->getFamilies();
$objProducts = new Products();

$result = '';
if (isset($_POST['update'])) {
    $id = $_POST['update'];
    unset($_POST['update']);
    $name = trim($_POST['name']);
    $shortName = trim($_POST['shortName']);
    $pvp = trim($_POST['pvp']);
    $family = trim($_POST['family']);
    $description = trim($_POST['description']);
    if ($name === '' || $shortName === '' || $pvp === '' || $family === '') {
        $result = 'noOk';
    } else {
        $objProducts->updateProduct($id, $name, $shortName, $description, $pvp, $family);
        $result = 'ok';
    }
}

$registerProduct = $objProducts->getProduct($_SESSION['id']);

$views = '../views';
$cache = '../cache';

$viewCreate = new Blade($views, $cache);
$tittle = 'Actualizar';
$header = 'Modificar Producto';
echo $viewCreate->view()->make('viewCreate', compact('tittle', 'header', 'tableFamilies', 'result', 'registerProduct'))->render();
