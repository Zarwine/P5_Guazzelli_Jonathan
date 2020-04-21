<?php 

namespace Guazzelli\Portfolio;

use \Guazzelli\Portfolio\Classes\Routeur;

include_once('_config.php');

MyAutoLoad::start();
MyAutoLoad::autoload('Routeur');
//MyAutoLoad::autoload('');

if(!isset($_GET['r'])){
    header('Location: home');
}

$request = $_GET['r'];

$routeur = new Routeur($request);
$routeur->renderController();

