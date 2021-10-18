<?php
class CommentManager

{
    private function dbConnect()
    {

        // suppression du try/catch car generer dans index.php
        $bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'fabino', 'MonopolI');
        return $bdd;
    }

    public function getComments($postId)
    {

        $bdd = $this->dbConnect();

        $requete = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC LIMIT 5 ');

        $requete->execute(array($postId));

        return $requete;
    }

    public function postComment($postId, $author, $comment)
    {

        $bdd = $this->dbConnect();

        $requete = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
        $postComment = $requete->execute(array($postId, $author, $comment));

        return $postComment; // juste pour tester dans le controleur la validite des infos 
    }

    function countComments($postId)
    {

        $bdd = $this->dbConnect();

        $requete = $bdd->prepare('SELECT COUNT(*) AS numberComment FROM commentaires WHERE  id_billet = ?');

        $requete->execute(array($postId));

        return $requete;
    }
}
