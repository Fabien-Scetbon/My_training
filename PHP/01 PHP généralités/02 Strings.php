<?php

    $phrase = 'Bonjour, je suis une phrase';

    $longueur = strlen($phrase);

    $phraseMelangee = str_shuffle($phrase);

    $nouvellePhrase = str_replace('o', 'x', $phrase);

    $phraseMin = strtolower($phrase); // toupper
