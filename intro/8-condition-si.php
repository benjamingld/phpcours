<?php

//condition simple

$age = 15;
if($age >= 18) {
    echo "La personne est majeur";
}else {
    echo "La personne est mineur";
}


//ternaire

$info = ($age >=18) ? "Majeur" : "Mineur";
echo $info;

($age >=18)? $message = "Majeur" : $message = "Mineur";
echo $message;


($age >=18) ? print "Majeur" : print "Mineur";

$a = 1;
$b = 2;

     if(isset($a) && isset($b)) {
//et : if(isset($a) and isset($b)) {
//ou : if(isset($a) || isset($b)) {
//ou : if(isset($a) or isset($b)) {
    echo "ok";
}else {
    echo "pas ok";
}