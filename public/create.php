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
if (isset($_POST['create'])) {
    unset($_POST['create']);
    $name = trim($_POST['name']);
    $shortName = trim($_POST['shortName']);
    $pvp = trim($_POST['pvp']);
    $family = trim($_POST['family']);
    $description = trim($_POST['description']);
    if ($name === '' || $shortName === '' || $pvp === '' || $family === '') {
        $result = 'noOk';
    } else {
        if (!$objProducts->validateShortName($shortName)) {
            $result = 'noOk';
        } else {
            $objProducts->insertProduct($name, $shortName, $description, $pvp, $family);
            $result = 'ok';
        }
    }
}

$views = '../views';
$cache = '../cache';

$viewCreate = new Blade($views, $cache);
$tittle = 'Crear';
$header = 'Crear Producto';
echo $viewCreate->view()->make('viewCreate', compact('tittle', 'header', 'tableFamilies', 'result'))->render();
