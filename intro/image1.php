<?php
//CE FICHIER EST UNE IMAGE
header("Content-type: image/png");
//JE RECUPERE LE TEXTE
$string = $_GET['text'];
//JE CREE LE FOND A PARTIR D'UNE BASE
$im = imagecreatefrompng("image/bouton.png");
//COULEUR TEXTE
$couleur = imagecolorallocate($im,20,20,60);
//POSITION AXE X
$px = (imagesx($im) - 20 * strlen($string)) / 2;
//LE TEXTE SUR L'IMAGE
imagestring($im,6,$px,18,$string,$couleur);
//ASSOCIATION DE L'ENSEMBLE
imagepng($im);

?>