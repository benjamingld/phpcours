<?php

$var1 = 5;
unset($var1);
var_dump($var1);

$letters = ['a','b','b','c'];
unset($letters[1]);
var_dump($letters);

//ATTENTION, on ne peut plus utiliser le FOR car trou dans l'indexation.