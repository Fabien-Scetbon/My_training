<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Journal</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>

<body>
    <!-- <header>
        <h1>FreeNewsPaper</h1>
    </header> -->

    <div>
        <p id="error">
            <?php
            echo ("Erreur : $errorMessage");
            ?>
        </p>
    </div>

    <form method="post" action="index.php">
        <button type="submit">Retour aux articles</button>
    </form>

</body>

</html>