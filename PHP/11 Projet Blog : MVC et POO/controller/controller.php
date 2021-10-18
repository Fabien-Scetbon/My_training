<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['postId']);
    $comments = $commentManager->getComments($_GET['postId']);
    $countComments = $commentManager->countComments($_GET['postId']);

    require('view/commentPostView.php');
}

function addPost($author, $title , $content)
{
    $postManager = new PostManager();

    $postPost = $postManager->postPost($author, $title , $content);

    if ($postPost === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        // Ce principe de "remontée" de l'erreur jusqu'à l'endroit du code 
        // qui contenait le bloc  try  est vraiment un gros avantage des exceptions.
        throw new Exception('Impossible d\'ajouter le commentaire !');    }
    else {
        header('Location: index.php?action=listPosts');
    }
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $postComment = $commentManager->postComment($postId, $author, $comment);

    if ($postComment === false) {

        throw new Exception('Impossible d\'ajouter le commentaire !');    
    } else {
        header('Location: index.php?action=post&postId=' . $postId);
    }
}

function delete($postId) {

    $postManager = new PostManager();

    $postManager->deletePost($postId);
    listPosts();

}
