<?php

	header ("Content-type: image/png");   // ou jpeg (photo)  -- annonce au nav qu'on envoie une image
										  // a mettre avant tout code html

	$image1 = imagecreate(200,50);  // long / larg en px -- $image est un objet avec infos 

	$image2 = imagecreatefromjpeg("couchersoleil.jpg"); // ou png

	imagepng($image1); // affiche image
?>