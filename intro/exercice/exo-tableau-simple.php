<?php

$tab = [10,15,20,10,5,10];

echo "<ul>";
foreach($tab as $key => $value) {
    echo "<li>".$value." </li>";
}
echo "</ul>";

$moyenne = "La moyenne est : ".array_sum($tab)/count($tab);
echo $moyenne;

echo "<br>";

$tableau = [];
for($i=0; $i < count($tab); $i++) {
    if($tab[$i] >= 10){
    $tableau[] =+ 1;
    }
}
echo "Le nombre d'élément qui sont supérieur ou égale est : ".count($tableau);
echo "<br>";

// if($tab[$i] == 20){
//     echo "La note 20 est présente <br>";
// }

echo "<br>";

$test = 20;
if(in_array($test, $tab)){
    echo "La note ".$test." est présente dans le tableau";
}

echo "<br>";

$top = max($tab);
        echo "<br>la meilleur note est:" . $top;
        $firstDelete = array_shift($tab);
        var_dump($tab, $firstDelete);
    
sort($tab);
var_dump($tab);

