<?php

function dbConnect() {

    // suppression du try/catch car generer dans index.php
        $bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'fabino', 'MonopolI');
        return $bdd;
   
}

function getPosts()
{
    $bdd = dbConnect();

    $requete = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC');
    // query et pas prepare surement parce que sans parametre dans getPost()

    // quand ça renvoie plusieurs elements on fetch dans vue

    return $requete;
}

function getPost($postId)
{
    $bdd = dbConnect();

    $requete = $bdd->prepare('SELECT * FROM billets WHERE id = ? ');

    $requete->execute(array($postId));

    $post = $requete->fetch(); // quand ça ne renvoie qu'un element on fetch ici

    return $post;
}

function getComments($postId) {

    $bdd = dbConnect();

    $requete = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC LIMIT 5 ');
    
    $requete->execute(array($postId));

    return $requete;
}

function postPost($author, $title ,$content) {

    $bdd = dbConnect();

    $requete = $bdd->prepare('INSERT INTO billets(auteur, titre, contenu , date_creation) VALUES(?, ?, ?, NOW())');
    $postPost = $requete->execute(array($author, $title, $content)); 

    return $postPost; // juste pour tester dans le controleur la validite des infos 
}

function postComment($postId , $author, $comment) {

    $bdd = dbConnect(); 

    $requete = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
    $postComment = $requete->execute(array($postId, $author, $comment)); 

    return $postComment; // juste pour tester dans le controleur la validite des infos 
}

function deletePost($postId) {

    $bdd = dbConnect();

    $bdd->exec('DELETE FROM billets WHERE id = "' . $postId . '"');

    $bdd->exec('DELETE FROM commentaires WHERE id_billet = "' . $postId . '"');
}

function countComments($postId) {
    
    $bdd = dbConnect();

    $requete = $bdd->prepare('SELECT COUNT(*) AS numberComment FROM commentaires WHERE  id_billet = ?');

    $requete->execute(array($postId));

    return $requete;

}


