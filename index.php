<?php 
include_once('_config.php');
MyAutoLoad::start();
use Portfolio\classes\Routeur;

if(!isset($_GET['r'])){
    header('Location: home');
}

$request = $_GET['r'];

$routeur = new Routeur($request);
$routeur->renderController();

