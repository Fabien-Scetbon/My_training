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

            $requete = $bdd->query('SELECT COUNT(*) AS numberMessage FROM minichat');
            $result = $requete->fetch();

            $nbMessages = $result['numberMessage'];
            $requete->closeCursor();
            
            $nbPages = $nbMessages%5 == 0 ? $nbMessages/5 : intdiv($nbMessages, 5) + 1;

            if (isset($_GET['noPage']) && !empty($_GET['noPage'])) { 
            
                $noPage = (int) $_GET['noPage']; 

            } else $noPage = 1;       
            
            $firstMessage = ($noPage - 1)*5;

            $requete = $bdd->query("SELECT pseudo,message, date_creation FROM minichat ORDER BY date_creation DESC LIMIT $firstMessage, 5 "); 
                                     
            while ($donnees = $requete->fetch()) {
            ?>
            <div id="message">
                <div>
                    <div id="pseudo">
                        <?php echo $donnees['pseudo']; ?>
                    </div>
                    <div id="time">
                        <?php echo $donnees['date_creation']; ?>
                    </div>
                </div>

                <div id="text">
                    <p><?php echo $donnees['message']; ?></p>
                </div>
            </div>

            <?php 
        } 
        
        $requete->closeCursor(); ?>

        <div class="pages">
            Pages :
            <span>
        <?php
            for($i=1 ; $i <= $nbPages ; $i++) { 
                if($i==$noPage) { ?>
                <a style="font-weight: bold;"> <?php echo $i; ?></a>
            <?php } else { ?>
                <a href="minichat (avec pages).php?noPage=<?php echo $i; ?>" > <?php echo $i; ?></a>
            <?php } 
            } ?>
            </span>
        </div>

    </div>
</body>
</html>

<!-- echo'<div id="presentation">
                            <img src="'.$adress.'" id="image" /><br/>

                            <input type="text"
                                value="http://localhost/'.$adress.'" />
                        </div>'; -->