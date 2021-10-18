<?php
	try {	
		$bdd = new PDO('mysql:host=localhost;dbname=autres_projets;charset=utf8','fabino', 'MonopolI');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MiniChat</title>
    <link rel="stylesheet" type="text/css" href="astyle.css">
</head>
<body>
    <header>
        <h1>MiniChat</h1>
    </header>
    <div class="container">
        <p id="info">Bienvenue sur MiniChat, vous pouvez commencer à chater !</p>

        <form method="post" action="minichat_post.php">
            <table>

                <tr>
                    <td>Pseudo</td>
                    <td><input type="text" name="pseudo" placeholder="8 caract. max" value=
                    <?php if (isset($_COOKIE['pseudo'])) echo $_COOKIE['pseudo']; 
                          else echo''; ?> ></td>
                    <td>
                        <label id="box" for="case"><p>Se souvenir de moi</p><input type="checkbox" name="cookie" id="case"/></label>
                    </td>
                </tr>

                <tr>
                    <td>Message</td>
                    <td><input type="text" name="message" required /></td>
                </tr>
                
            </table>

            <button type="submit">Envoyer</button>
        </form>

        <?php
        
        /*$requete = $bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 10'); avec date US */
        $requete = $bdd->query('SELECT pseudo,message, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr  FROM minichat ORDER BY date_creation_fr DESC LIMIT 5'); /* date FR */
        /* ou (date_creation, \'%d/%m/%Y à %Hh%imin%ss\') pour texte dedans */                              
        while ($donnees = $requete->fetch()) {
            ?>
            <div id="message">
                <div>
                    <div id="pseudo">
                        <?php echo $donnees['pseudo']; ?>
                    </div>
                    <div id="time">
                        <?php echo $donnees['date_creation_fr']; ?>
                    </div>
                </div>

                <div id="text">
                    <p><?php echo $donnees['message']; ?></p>
                </div>
            </div>

            <?php 
        } 
        
        $requete->closeCursor(); ?>
    </div>
</body>
</html>