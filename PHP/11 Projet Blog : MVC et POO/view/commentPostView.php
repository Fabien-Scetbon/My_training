<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Journal</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>

<body>
    <header>
        <h1>FreeNewsPaper</h1>
    </header>
    <div class="container2">

        <?php

        // print_r($post);  le tableau $post est global dans ce script

        ?>
            <div class="billet2">
                <div id="infos">
                    <div id="auteur">
                        <?php echo htmlspecialchars($post['auteur']); ?>
                    </div>
                    <div id="titre">
                        <?php echo htmlspecialchars($post['titre']); ?>
                    </div>
                    <div id="time">
                        <?php echo htmlspecialchars($post['date_creation']); ?>
                    </div>
                </div>

                <div id="text">
                    <p><?php echo nl2br(htmlspecialchars($post['contenu'])); ?></p>
                </div>
           
            </div>
            <div class="result">
                <?php

                $requete = $countComments;
                while ($result = $requete->fetch()) {

                    if ($result['numberComment'] == 0) {  // result = [numbercomment => valeur]

                        echo ('<h2>Pas de commentaire pour cet article.</h2>');
                    } else {

                        echo ('<h2>Commentaires</h2>');


                        while ($donnees = $comments->fetch()) {
                ?>
                            <div class="billet3">
                                <div id="infos">
                                    <div id="auteur">
                                        <?php echo htmlspecialchars($donnees['auteur']); ?>
                                    </div>

                                    <div id="time">
                                        <?php echo htmlspecialchars($donnees['date_commentaire']); ?>
                                    </div>
                                </div>

                                <div id="text">
                                    <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
                                </div>

                            </div>
                    <?php }
                    } ?>
            </div>
        <?php

                    $requete->closeCursor();
                }  ?>
        <div class="commentaires">
            <h2>Ajouter un commentaire</h2>
           
            <form method="post" action="index.php?action=addComment&amp;postId=<?php echo $post['id']; ?>">
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