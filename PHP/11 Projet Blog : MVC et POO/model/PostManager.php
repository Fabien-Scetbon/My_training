<?php
class PostManager
{
    private function dbConnect()
    {

        // suppression du try/catch car generer dans index.php
        $bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'fabino', 'MonopolI');
        return $bdd;
    }

    public function getPosts()
    {
        $bdd = $this -> dbConnect();

        $requete = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC');
        // query et pas prepare surement parce que sans parametre dans getPost()

        // quand ça renvoie plusieurs elements on fetch dans vue

        return $requete;
    }

    public function getPost($postId)
    {
        $bdd = $this-> dbConnect();

        $requete = $bdd->prepare('SELECT * FROM billets WHERE id = ? ');

        $requete->execute(array($postId));

        $post = $requete->fetch(); // quand ça ne renvoie qu'un element on fetch ici

        return $post;
    }

    public function postPost($author, $title, $content)
    {
        $bdd = $this->dbConnect();

        $requete = $bdd->prepare('INSERT INTO billets(auteur, titre, contenu , date_creation) VALUES(?, ?, ?, NOW())');
        $postPost = $requete->execute(array($author, $title, $content));

        return $postPost; // juste pour tester dans le controleur la validite des infos 
    }
    function deletePost($postId)
    {

        $bdd = $this->dbConnect();

        $bdd->exec('DELETE FROM billets WHERE id = "' . $postId . '"');

        $bdd->exec('DELETE FROM commentaires WHERE id_billet = "' . $postId . '"');
    }

  
}
