<?php
	try {	
		$bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8','fabino', 'MonopolI');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

    if(!empty($_POST['auteur_comment']) && !empty($_POST['contenu_comment']) && isset($_GET['billet'])) {

        $auteur_comment		= htmlspecialchars($_POST['auteur_comment']);
        $contenu_comment     = htmlspecialchars($_POST['contenu_comment']);
        $numero_billet = (int) $_GET['billet'];

	$requete = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
	$requete->execute(array($numero_billet, $auteur_comment, $contenu_comment)); 

    header('location: commentaires.php?billet='.$numero_billet.'');
	exit();

    } else {

		header('location: commentaires.php');
	}
?>
