<?php
var_dump(1);
$compteur = 1;

//TANT QUE
var_dump(2);
while($compteur <= 10) {
    echo $compteur."<br>";
    $compteur = $compteur + 1;
    //EQUIVALENT
    //$compteur++
    //$compteur +=1
}

var_dump(3);

    do{
        echo $compteur."<br>";
        $compteur = $compteur - 1;

    }while ($compteur >=1);


$array =[1,2,3,4,5,6];
$i = 0;
while(isset ($array[$i])) {

    echo $array [$i];
    $i++;
}