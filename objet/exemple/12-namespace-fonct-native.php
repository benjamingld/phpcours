<?php



namespace C;

function strlen($var){
    echo "Hello Word {$var}";
}






namespace D;
function strlen($var){
    echo "test {$var}";
}

//NAMESPACE D
echo strlen('Hello Word!');
//NAMESPACE D
echo \D\strlen('Hello Word!');
//POUR AVOIR UN STRLEN NATIF, ON MET UN \ DEVANT STRLEN
echo \strlen('Hello Word!');
//NAMESPACE C
echo \C\strlen('Hello Word!');



