<pre>
    <?php
    print_r($_GET['nomVariables']); // pour afficher contenu
    ?>
</pre> 

<!-- 
Variables valables sur toutes les pages car stockées dans nav (en particulier $_SESSION et ses variables ['var'])

$_SERVER valeurs renvoyées par serveur
    retenir : $_SERVER['REMOTE_ADDR']  adresse ip client

$_SESSION    $_COOKIE    $_GET    $_POST    $_FILES    . . .


