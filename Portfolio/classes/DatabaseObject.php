<?php
namespace Jogu\portfolio\classes;
use PDO;
use PDOException;

class DatabaseObject { //Class Parent de jf_usermanager.php, se connecte a la BDD
 
    protected $bdd;
    
    public function __construct()
    {
        try{
        $this->bdd = new PDO("mysql:host=jogufrdkog533.mysql.db:3306;dbname=jogufrdkog533;charset=utf8", "jogufrdkog533", "MaBDD550");
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $error_bdd) {
            session_start();       
            $_SESSION['flash']['danger'] = "Erreur à la connexion de la base de donnée reçue : " .$error_bdd->getMessage();
            header('Location: https://jogu.fr/home');
           
        }
    }

}