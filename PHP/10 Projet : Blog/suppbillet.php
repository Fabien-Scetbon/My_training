<?php

    if (isset($_GET['billet']) && !empty($_GET['billet'])) { 

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8','fabino', 'MonopolI');
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
            
        $numero_billet = (int) $_GET['billet'];        
	
        $bdd->exec('DELETE FROM billets WHERE id = "'.$numero_billet.'"');
       
        $bdd->exec('DELETE FROM commentaires WHERE id_billet = "'.$numero_billet.'"');

        header('location: index.php');
		exit();

    } else { 
        header('location: index.php');
    }