<?php
namespace Portfolio\model;
use Portfolio\classes\Database;
use PDO;

require_once (MODEL.'Pf_article.php');

class Pf_articleManager extends Database //Traite toute la partie BDD des articles du site
{
    public function findAll() //Trouve tous les articles
    {
        $bdd = $this->bdd;
        
        $query = "SELECT * FROM pf_article ORDER BY id";

        $req = $bdd->prepare($query);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $pf_article = new Pf_article();
            $pf_article->setId($row['id']);
            $pf_article->setName($row['name']);
            $pf_article->setContent($row['content']);
            $pf_article->setCreated_at($row['created_at']);

            $pf_articles[] = $pf_article;
        };

        return $pf_articles;
    }
    public function findAllJSON()
    {
        $bdd = $this->bdd;
        
        $query = "SELECT * FROM pf_article ORDER BY id";

        $req = $bdd->prepare($query);       
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) //Trouve un article choisi
    {
        $bdd = $this->bdd;      
        
        $query = "SELECT * FROM pf_article WHERE id = :id";
        $bdd = new PDO("mysql:host=jogufrdkog533.mysql.db:3306;dbname=jogufrdkog533;charset=utf8", "jogufrdkog533", "MaBDD550");
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);

        $pf_article = new Pf_article();
        $pf_article->setId($row['id']);
        $pf_article->setName($row['name']);
        $pf_article->setContent($row['content']);
        $pf_article->setCreated_at($row['created_at']);

        return $pf_article;
    
    }

    public function create($values)
    {
        $bdd = $this->bdd;    
      
        $query = "INSERT INTO pf_article (id, name, content, created_at)
        VALUES (NULL, :name, :content, CURRENT_TIMESTAMP);";

        $req = $bdd->prepare($query);
        $req->bindValue(':name', $values['name'], PDO::PARAM_STR);
        $req->bindValue(':content', $values['content'], PDO::PARAM_STR);
        $req->execute();
    }
    public function edit($values)
    {
        $bdd = $this->bdd;      
      
        $query = "UPDATE pf_article SET `name` = :name, `content` = :content WHERE `pf_article`.`id` = :id;";

        $req = $bdd->prepare($query);

        $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
        $req->bindValue(':name', $values['name'], PDO::PARAM_STR);
        $req->bindValue(':content', $values['content'], PDO::PARAM_STR);

        $req->execute();
    }

    public function delete($id)
    {
        $bdd = $this->bdd;
        $query = "DELETE FROM pf_article WHERE id = :id";

        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }
}