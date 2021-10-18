<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Utilisation de GET_</title>
    
  </head>
  <body>
    <p>
        <a href="09 variables GET_. par URL.php?possesseur=Florent&amp;prix_max=20">Cliquer ici pour afficher les résultats</a> <!-- modifiable par user -->
    </p>            <!-- &amp; c'est & en html pour convention W3C -mais & fonctionne- -->
   
    <p> Erreurs tant que possesseur=Florent&prix_max=20 absents de l'URL </p>
  </body>
</html>




<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=formation_udemy;charset=utf8', 'fabino', 'MonopolI');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ?  AND prix <= ? ORDER BY prix');
$req->execute(array($_GET['possesseur'], $_GET['prix_max']));

echo '<ul>';
while ($donnees = $req->fetch())
{
	echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
}
echo '</ul>';

$req->closeCursor();

?>

