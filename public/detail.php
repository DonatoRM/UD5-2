<?php
require_once '../vendor/autoload.php';
session_start();

use Philo\Blade\Blade;
use \Donatorm\Ud52\Products;

$objProduct = new Products();
$arrayProduct = $objProduct->getProduct($_SESSION['id']);
unset($_SESSION['id']);
$id = $arrayProduct['id'];
$name = $arrayProduct['nombre'];
$shortName = $arrayProduct['nombre_corto'];
$description = $arrayProduct['descripcion'];
$pvp = $arrayProduct['pvp'];
$family = $arrayProduct['familia'];

$views = '../views';
$cache = '../cache';

$viewDetail = new Blade($views, $cache);
$tittle = 'Detalle';
$header = 'Detalle Producto';
echo $viewDetail->view()->make('viewDetail', compact('tittle', 'header', 'id', 'name', 'shortName', 'description', 'pvp', 'family'))->render();
