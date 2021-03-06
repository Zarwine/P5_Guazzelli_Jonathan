<?php

namespace Portfolio\model;

use Portfolio\classes\Database;
use PDO;

require_once(MODEL . 'Pf_comment.php');

class Pf_commentManager extends Database  //Traite toute la partie Commentaire du site
{
    public function findAll() //Trouve tous les com pour le menu d'admin
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM pf_comment  ORDER BY id DESC";
        $req = $bdd->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $pf_comment = new Pf_comment();
            $pf_comment->setId($row['id']);
            $pf_comment->setAuteur($row['auteur']);
            $pf_comment->setCreated_at($row['created_at']);
            $pf_comment->setContent($row['content']);
            $pf_comment->setArticle_id($row['article_id']);
            $pf_comment->setReported($row['reported']);
            $pf_comment->setEdited_at($row['edited_at']);
            $pf_comments[] = $pf_comment;
        };
        return $pf_comments;
    }

    public function findForOneArticle($article_id)  //Trouve tous les com pour un article défini
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM pf_comment WHERE article_id = :id ORDER BY id DESC";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $article_id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetchAll();
        for ($i = 0; $i < count($row); $i++) {
            $pf_comment = new Pf_comment();
            $pf_comment->setId($row[$i]['id']);
            $pf_comment->setAuteur($row[$i]['auteur']);
            $pf_comment->setContent($row[$i]['content']);
            $pf_comment->setCreated_at($row[$i]['created_at']);
            $pf_comment->setArticle_Id($row[$i]['article_id']);
            $pf_comment->setReported($row[$i]['reported']);
            $pf_comment->setEdited_at($row[$i]['edited_at']);
            $pf_comments[] = $pf_comment;
        }
        if (isset($pf_comments)) {
            return $pf_comments;
        }
    }

    public function find($article_id) //Trouve quel commenaitre correspond a quel article
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM pf_comment WHERE article_id = :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $article_id, PDO::PARAM_INT);
        $req->execute();
        $pf_comments = $req->fetchAll();
        return $pf_comments;
    }
    public function findArticle($comment_id) //Trouve a quel article correspond le commentaire grace aux infos du commentaires
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM pf_comment WHERE id = :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $comment_id, PDO::PARAM_INT);
        $req->execute();
        $pf_comment = $req->fetchAll();
        $article_id = $pf_comment[0]["article_id"];
        $query2 = "SELECT * FROM pf_article WHERE id = :id";
        $req2 = $bdd->prepare($query2);
        $req2->bindValue(':id', $article_id, PDO::PARAM_INT);
        $req2->execute();
        $pf_comments = $req2->fetchAll();
        return $pf_comments;
    }

    public function findComment($id) //Trouve le commentaire seul
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM pf_comment WHERE id = :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $pf_comment = new Pf_comment();
            $pf_comment->setId($row['id']);
            $pf_comment->setAuteur($row['auteur']);
            $pf_comment->setCreated_at($row['created_at']);
            $pf_comment->setContent($row['content']);
            $pf_comment->setArticle_id($row['article_id']);
            $pf_comment->setReported($row['reported']);
            $pf_comment->setEdited_at($row['edited_at']);
        }
        return $pf_comment;
    }

    public function create($comment, $username, $article_id)
    {
        $bdd = $this->bdd;
        $query = "INSERT INTO pf_comment (id, auteur, created_at, content, article_id)
        VALUES (NULL, :auteur, CURRENT_TIMESTAMP, :content, :article_id);";
        $req = $bdd->prepare($query);
        $req->bindValue(':auteur', $username, PDO::PARAM_STR);
        $req->bindValue(':content', $comment, PDO::PARAM_STR);
        $req->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $req->execute();
    }

    public function edit($values)
    {
        $bdd = $this->bdd;
        $query = "UPDATE pf_comment SET `content` = :content , `edited_at` = NOW() WHERE `pf_comment`.`id` = :id;";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
        $req->bindValue(':content', $values['content'], PDO::PARAM_STR);
        $req->execute();
    }

    public function report($id)
    {
        $bdd = $this->bdd;
        $query = "UPDATE pf_comment SET `reported` = '1' WHERE `pf_comment`.`id` = :id;";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function acquit($id) //Remet la valeur de "reported" à 0 pour supprimer le signalement d'un com
    {
        $bdd = $this->bdd;
        $query = "UPDATE pf_comment SET `reported` = '0' WHERE `pf_comment`.`id` = :id;";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function delete($id)
    {
        $bdd = $this->bdd;
        $query = "DELETE FROM pf_comment WHERE id = :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }
}
