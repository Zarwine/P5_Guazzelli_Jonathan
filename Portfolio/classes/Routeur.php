<?php
namespace Jogu\portfolio\classes;

class Routeur
{
    private $request;

    private $routes = [
        "home"                => ["controller" => "Home",   "method" => "showHome"],                //Rediction vers la HomePage

        "create"              => ["controller" => "Home",   "method" => "createArticle"],           //Début des redirections CRUD
        "modification"        => ["controller" => "Home",   "method" => "createArticle"],
        "delete"              => ["controller" => "Home",   "method" => "delArticle"],
        "edition"             => ["controller" => "Home",   "method" => "editionArticle"],
        "add"                 => ["controller" => "Home",   "method" => "addArticle"],
        "view"                => ["controller" => "Home",   "method" => "showArticle"],             //Fin CRUD

        "register"            => ["controller" => "Member", "method" => "showRegister"],            //Début Espace membre
        "register_confirm"    => ["controller" => "Member", "method" => "verifAll"],
        "login"               => ["controller" => "Member", "method" => "showLogin"],
        "login_confirm"       => ["controller" => "Member", "method" => "login"],
        "forget"              => ["controller" => "Member", "method" => "showForget"],
        "forgetPassword"      => ["controller" => "Member", "method" => "forgetPassword"],
        "account"             => ["controller" => "Member", "method" => "showAccount"],
        "confirm"             => ["controller" => "Member", "method" => "registerConfirm"],
        "changePassword"      => ["controller" => "Member", "method" => "changePassword"],
        "reset"               => ["controller" => "Member", "method" => "resetPassword"],
        "reset_confirm"       => ["controller" => "Member", "method" => "resetPasswordConfirm"],
        "logout"              => ["controller" => "Member", "method" => "logout"],                  //Fin Espace membre

        "comCreate"           => ["controller" => "Comment",   "method" => "createComment"],        //Début Commentaires
        "comReport"           => ["controller" => "Comment",   "method" => "reportComment"],
        "comDelete"           => ["controller" => "Comment",   "method" => "delComment"],
        "comDeleteAd"         => ["controller" => "Comment",   "method" => "delCommentAdmin"],
        "comModif"            => ["controller" => "Comment",   "method" => "modifComment"],
        "com_edit"            => ["controller" => "Comment",   "method" => "editionComment"],
        "comAcquit"           => ["controller" => "Comment",   "method" => "acquitComment"],
        "com_view"            => ["controller" => "Comment",   "method" => "showArticle"],          //Fin Commentaires

    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getRoute() //défini une route en selection le 1er parametre d'url
    {
        $elements = explode('/', $this->request);
        return $elements[0];
    }

    public function getParams() //recupère les parametres suivants la route pour les redirections d'article défini par exemple
    {
        $params = null;

        $elements = explode('/', $this->request);
        unset($elements[0]);

        for ($i = 1; $i < count($elements); $i++) {
            $params[$elements[$i]] = $elements[$i + 1];
            $i++;
        }
        if ($_POST) {
            foreach ($_POST as $key => $val) {
                $params[$key] = $val;
            }
        }

        return $params;
    }


    public function renderController()
    {

        $route = $this->getRoute();    //Explose l'url et récupère le premier élément
        $params = $this->getParams();  //Récupère l'élement après $route pour le passer en paramettre 

        //Si $route = null --> Homepage

        if (key_exists($route, $this->routes)) {


            $controller = $this->routes[$route]['controller'];
            $method     = $this->routes[$route]['method'];
            $currentController = new $controller(); //Ici $controller() == Home(), pourtant j'ai l'erreur ligne suivante.
       
            $currentController->$method($params);

            //Fatal error: Uncaught Error: Class 'Home' not found in /home/jogufrdkog/www/Portfolio/classes/Routeur.php:96 
            //Stack trace: #0 /home/jogufrdkog/www/index.php(19): Guazzelli\Portfolio\Classes\Routeur->renderController()
            // #1 {main} thrown in /home/jogufrdkog/www/Portfolio/classes/Routeur.php on line 96


        } else {
            session_start();
            $_SESSION['flash']['danger'] = "Erreur 404 reçue : La page demandée n'existe pas";
            //$_SESSION['flash']['danger'] = "Erreur 404 reçue : " .$errorRoute->getMessage();
            header('Location: https://jogu.fr/home');
        }

    }
}
