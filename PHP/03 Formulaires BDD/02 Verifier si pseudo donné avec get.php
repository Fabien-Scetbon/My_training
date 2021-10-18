<?php

$pseudo = (!empty($_GET['pseudo'])) ? $_GET['pseudo'] : 'unknow user';

echo "Hello ".$pseudo;

// la requete GET passe par l'url de la page (post : serveur) donc pour afficher Hello Fabien
// ajouter /?pseudo=fabien à la fin de l'url localhost/.../?pseudo=fabien 