<?php
namespace Portfolio\classes;
use PDO;
use PDOException;

class Database { //Class Parent de pf_usermanager.php, se connecte a la BDD
 
    protected $bdd;
    
    public function __construct()
    {
        try {
            $this->bdd = new PDO("mysql:host=jogufrdkog533.mysql.db:3306;dbname=jogufrdkog533;charset=utf8", "jogufrdkog533", "MaBDD550");
            } catch (PDOException $errorBDD) {
                session_start();       
                $_SESSION['flash']['danger'] = "Erreur de la base de donnée reçue : " .$errorBDD->getMessage();
                header('Location: https://jogu.fr/home');  
            }
    }

}