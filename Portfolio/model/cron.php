<?php

namespace Portfolio\model;

use PDO;

$bdd = new PDO("mysql:host=jogufrdkog533.mysql.db:3306;dbname=jogufrdkog533;charset=utf8", "jogufrdkog533", "MaBDD550");
$nettoyage = $bdd->prepare('DELETE FROM pf_bruteforce');
$nettoyage->execute();
$nettoyage->closeCursor();
//Nettoi la table jf_bruteforce chaque heure pour éviter le spam du formulaire de connection 