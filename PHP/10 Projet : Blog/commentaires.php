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
    <div class="container2">
        
		<?php 
        if (isset($_GET['billet']) && !empty($_GET['billet'])) { 
            
            $numero_billet = (int) $_GET['billet'];        
        	$requete = $bdd->query("SELECT * 
									FROM billets 
									WHERE id=$numero_billet ");

			while ($donnees = $requete->fetch()) {
				?>
					<div class="billet2">		
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
							<p><?php echo nl2br($donnees['contenu']); ?></p>
						</div>
            <?php 
        	} 
        	$requete->closeCursor(); 
		 	?>
        			</div>
		<div class="result">
		<?php
		
		$requete = $bdd->prepare('SELECT COUNT(*) AS numberComment FROM commentaires WHERE  id_billet = ?');
		$requete->execute(array($numero_billet));
		
		while($result = $requete->fetch()) {
		
			if($result['numberComment'] == 0) { 

				echo ('<h2>Pas de commentaire pour cet article.</h2>');

			} else {

				echo('<h2>Commentaires</h2>');
					$requete = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC LIMIT 5 ');

					$requete->execute(array($numero_billet));


			while ($donnees = $requete->fetch()) {
		?>
				<div class="billet3">
					<div id="infos">
						<div id="auteur">
							<?php echo $donnees['auteur']; ?>
						</div>
						
						<div id="time">
							<?php echo $donnees['date_commentaire']; ?>
						</div>
					</div>

					<div id="text">
						<p><?php echo nl2br($donnees['commentaire']); ?></p>
					</div>
					
				</div>
  <?php }
			} ?>
		</div>
	<?php 
			$requete->closeCursor();
		}
		} else { header('location: index.php');
				 exit();} ?>
		<div class="commentaires">
			<h2>Ajouter un commentaire</h2>
			<form method="post" action="savecomment.php?billet=<?php echo $numero_billet; ?>">
				<table>

					<tr>
						<td>Auteur</td>
						<td><input type="text" name="auteur_comment" placeholder="Votre nom" required></td>
					</tr>

					<tr>
						<td>Commentaire</td>
						<td><textarea name="contenu_comment" placeholder="Commentaire" rows="8" cols="70" required></textarea></td>
					</tr>
						
				</table>
				<button type="submit">Poster</button>

			</form>

			<form method="post" action="index.php">
				<button type="submit">Retour aux articles</button>
			</form>

		</div>
    </div>
</body>
</html>