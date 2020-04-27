<?php
namespace Jogu\portfolio\controller;
use Jogu\portfolio\model\Pf_articleManager;
use Jogu\portfolio\classes\View;
use Jogu\portfolio\model\Pf_commentManager;
use Jogu\portfolio\model\Pf_article;

//Gère tout ce qu'il se passe en homepage mais aussi les articles
class Home 
{
    public function showHome($params) //HomePage avec tout les articles
    {

        $manager = new Pf_articleManager();
        $pf_articles = $manager->findAll();        
        //$pf_articles_JSON = $manager->findAllJSON();        

        $myView = new View('home');
        $myView->render(array('pf_articles' => $pf_articles));
        
    }
    public function showArticle($params) //Article seul avec com
    {   
        extract($params);
        $art_manager = new Pf_articleManager();
        $pf_article = $art_manager->find($id);

        $comment_manager = new Pf_commentManager();
        $pf_comments = $comment_manager->findForOneArticle($pf_article->getId());  

        $myView = new View('article');
        if($pf_comments == NULL){
            $myView->render(array('pf_article' => $pf_article));
        }else {
            $myView->render(array(            
            'pf_article' => $pf_article,
            'pf_comments' => $pf_comments,
        ));
        }
        
    }

    public function createArticle($params) //Créer ou éditer un article
    {        

        if(isset($params)){
            extract($params);
        }
        
        if(isset($id)) {

            $manager = new Pf_articleManager();
            $pf_article = $manager->find($id);

            $myView = new View('edit');
            $myView->render(array('pf_article' => $pf_article));
        

        } else {
            $pf_article = new Pf_article();
            $myView = new View('create');
            $myView->render(array('pf_article' => $pf_article));
        }
        
    }

    public function editionArticle($params) //edition article en bdd
    {

        $values = $_POST['values'];

        $manager = new Pf_articleManager();
        $manager->edit($values);

        session_start();
        $_SESSION['flash']['success'] = "L'article a correctement été édité";

        $myView = new View();
        $myView->redirect('home');
    }


    public function addArticle($params) //ajout d'article en bdd
    {

        $values = $_POST['values'];


        $manager = new Pf_articleManager();
        $manager->create($values);

        session_start();
        $_SESSION['flash']['success'] = "Création d'article réussie";

        $myView = new View();
        $myView->redirect('home');
    }

    public function delArticle($params) //suppression d'article en bdd
    {
        extract($params);

        $manager = new Pf_articleManager();
        $manager->delete($id);

        session_start();
        $_SESSION['flash']['success'] = "Article correctement supprimé";

        $myView = new View();
        $myView->redirect('home');

    }    
}



