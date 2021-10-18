
**DIFFERENTS TYPES DE DATES

    -> DATE date au format AAAA-MM-JJ
    -> TIME moment au format HH:MM:SS
    -> DATETIME les deux
    -> TIMESTAMP nb de s depuis 1er janv 1970 à 00:00:00
    -> YEAR annee au format AA ou AAAA

Dans phpMyAdmin : Nom date_creation (eviter date)      Type DATETIME     Valeur par def CURRENT_TIMES (date actuelle)

**UTILISATIONS

--> SELECT pseudo, message, date FROM minichat WHERE date >= '2010-04-02 15:28:22' (AND date <= '2010-09-02 15:28:22')

renvoie les messages postés apres (entre) la (les) date(s)

    ** ... WHERE date BETWEEN '2010-04-02 00:00:00' AND '2010-04-18 00:00:00'   c'est mieux !

--> INSERT INTO minichat(pseudo, message, date) VALUES('Mateo', 'Message !', '2010-04-02 16:32:22')

inserer un nouveau message avec la bonne syntaxe de date

--> INSERT INTO minichat(pseudo, message, date) VALUES('Mateo', 'Message !', NOW())

inserer un nouveau message avec la date actuelle au format AAAA-MM-JJ HH:MM:SS

a la place de NOW() -> CURDATE() que AAAA-MM-JJ
                    -> CURTIME() que HH:MM:SS
                    -> DAY() ou MONTH() ou YEAR()

--> SELECT pseudo, message, DAY(date) AS jour FROM minichat

recupere pseudo, message et jour de post

a la place de DAY() -> MINUTE() ou SECOND()

--> SELECT pseudo, message, DATE_FORMAT(date, '%d/%m/%Y %Hh%imin%ss') AS date FROM minichat

format France

--> SELECT pseudo, message, DATE_ADD(date, INTERVAL 15 DAY) AS date_expiration FROM minichat

date_expiration est la date du message + 15 jours

a la place de DAY -> MONTH ou YEAR ou HOUR ou MINUTE ou SECOND

--> SELECT pseudo, message, DATE_SUB(date, INTERVAL 15 DAY) AS date_expiration FROM minichat

pour soustraire

<?php 

    $jour = date('d');
    $mois = date('m');
    $annee = date('Y');

    $heure = date('H');
    $minute = date('i');

    echo 'Bonjour ! Nous sommes le '.$jour.'/'.$mois.'/'.$annee.' et il est '.$heure.':'.$minute;