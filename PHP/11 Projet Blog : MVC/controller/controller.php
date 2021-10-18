<?php

require('model/model.php');

function listPosts()
{
    $posts = getPosts();

    require('view/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['postId']);
    $comments = getComments($_GET['postId']);
    $countComments = countComments($_GET['postId']);

    require('view/commentPostView.php');
}

function addPost($author, $title , $content)
{
    $postPost = postPost($author, $title , $content);

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
    $postComment = postComment($postId, $author, $comment);

    if ($postComment === false) {

        throw new Exception('Impossible d\'ajouter le commentaire !');    
    } else {
        header('Location: index.php?action=post&postId=' . $postId);
    }
}

function delete($postId) {

    deletePost($postId);
    listPosts();

}
