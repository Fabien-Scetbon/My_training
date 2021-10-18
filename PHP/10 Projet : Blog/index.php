<?php
	try {	
		$bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8','fabino', 'MonopolI');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Journal</title>
    <link rel="stylesheet" type="text/css" href="bstyle.css">
</head>
<body>
    <header>
        <h1>FreeNewsPaper</h1>
    </header>
    <div class="container">
        <div class="gauche">
            <h2>Rédigez votre article</h2>
            <form method="post" action="savebillet.php">
                <table>

                    <tr>
                        <td>Auteur</td>
                        <td><input type="text" name="auteur_billet" placeholder="Votre nom" required></td>
                    </tr>

                    <tr>
                        <td>Sujet</td>
                        <td><input type="text" name="titre" placeholder="Le titre" required /></td>
                    </tr>

                    <tr>
                        <td>Article</td>
                        <td><textarea name="contenu_billet" placeholder="Contenu" rows="15" cols="50" required></textarea></td>
                    </tr>
                    
                </table>

                <button type="submit">Poster</button>
            </form>
        </div>

        <div class="droite">
        <?php

        $requete = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC');


        // formater la date France ('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation');
        while ($donnees = $requete->fetch()) {
            ?>
            
                <div class="billet1">
                    <div id="infos">
                        <div id="auteur">
                            <?php echo $donnees['auteur']; ?>
                        </div>
                        <div id="titre">
                            <?php echo $donnees['titre']; ?>
                        </div>
                        <div id="time">
                            <?php echo $donnees['date_creation']; ?>
                        </div>
                    </div>

                    <div id="text">
                        <p><?php echo nl2br($donnees['contenu']) /* conserve les retours ligne */; ?></p> 
                    </div>
                    <p id="commentaires">
                        <a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a><br/>
                        <a style="color: #d14318" href="suppbillet.php?billet=<?php echo $donnees['id']; ?>">Supprimer l'article</a> 

                    </p>
                </div>
        
            <?php 
        } 
        $requete->closeCursor(); ?>
        </div>
    </div>
</body>
</html>