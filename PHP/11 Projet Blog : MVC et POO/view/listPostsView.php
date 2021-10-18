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
    <div class="container">
        <div class="gauche">
            <h2>Rédigez votre article</h2>

            <form method="post" action="index.php?action=addPost">
                <table>

                    <tr>
                        <td>Auteur</td>
                        <td><input type="text" name="auteur_billet" placeholder="Votre nom"></td>
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
            while ($donnees = $posts->fetch()) {
            ?>

                <div class="billet1">
                    <div id="infos">
                        <div id="auteur">
                            <?php echo htmlspecialchars($donnees['auteur']); ?>
                        </div>
                        <div id="titre">
                            <?php echo htmlspecialchars($donnees['titre']); ?>
                        </div>
                        <div id="time">
                            <?php echo htmlspecialchars($donnees['date_creation']); ?>
                        </div>
                    </div>

                    <div id="text">
                        <p><?php echo nl2br(htmlspecialchars($donnees['contenu'])) /* conserve les retours ligne */; ?></p>
                    </div>
                    <p id="commentaires">
                        <a href="index.php?action=post&amp;postId=<?php echo $donnees['id']; ?>">Commentaires</a><br />
                        <a style="color: #d14318" href="index.php?action=delete&amp;postId=<?php echo $donnees['id']; ?>">Supprimer l'article</a>

                    </p>
                </div>

            <?php
            }
            $posts->closeCursor(); ?>
        </div>
    </div>
</body>

</html>