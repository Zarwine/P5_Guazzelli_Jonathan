<?php 
include_once('DBinfo.php'); //Charge le fichier config.php qui permet le chargement automatique des autres fichiers
include_once('_config.php'); //Charge le fichier config.php qui permet le chargement automatique des autres fichiers
MyAutoLoad::start();
use Portfolio\classes\Routeur;

if(!isset($_GET['r'])){
    header('Location: home');
}

$request = $_GET['r'];

$routeur = new Routeur($request); //Initialise le routeur et lance la fonction renderController
$routeur->renderController();

