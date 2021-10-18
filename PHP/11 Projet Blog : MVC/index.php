<?php
require('controller/controller.php');

try {

    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'listPosts') {

            listPosts();
        } elseif ($_GET['action'] == 'post') {

            if (isset($_GET['postId']) && $_GET['postId'] > 0) { // pk 2eme condition ?
                post();
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        } elseif ($_GET['action'] == 'addPost') {

            if (!empty($_POST['auteur_billet']) && !empty($_POST['titre']) && !empty($_POST['contenu_billet'])) {
                echo ("POST AJOUTE");
                addPost($_POST['auteur_billet'], $_POST['titre'], $_POST['contenu_billet']);
            } else {
                throw new Exception(' tous les champs du commentaire ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'addComment') {

            if (isset($_GET['postId']) && $_GET['postId'] > 0) {

                if (!empty($_POST['auteur_comment']) && !empty($_POST['contenu_comment'])) {
                    addComment($_GET['postId'], $_POST['auteur_comment'], $_POST['contenu_comment']);
                } else {
                    throw new Exception(' tous les champs du commentaire ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'delete') {

            if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                delete($_GET['postId']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    } else {

        listPosts();
    }
} 

catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
