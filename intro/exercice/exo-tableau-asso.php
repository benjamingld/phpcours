<?php

echo "<h1>EXO TABLEAU</h1>";

//creation de tableau
$note = [
    "Said" => 13,
    "Julien" => 16,
    "Najat" => 15
];

//ajourt de karim
$note["Karim"] = 15;

var_dump($note);

//supression de julien
unset($note["Julien"]);

var_dump($note);

$max = max($note);
$min = min($note);

echo "La note minimale est : ".$min." et la note maximum est : ".$max;