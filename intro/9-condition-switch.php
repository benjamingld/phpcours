<?php

$score = 10;

// switch ($score) {
//     case 1 :
//         $message = "e";
//         break;
//     case 2 :
//     case 3 :
//         $message = "d";
//         break;
//     case 4 :
//     case 5 : 
//         $message = "c";
//         break;
//     case 6 :
//     case 7 :
//         $message = "b";
//         break;
//     case 8 : 
//     case 9 :
//         $message = "a";
//         break;
//     case 10 : 
//         $message = "+a";
//         break;
//     default :
//     $message = "Vous avez triché";

// }

//MEME RESULTAT
switch (true) {
    case ($score == 1):
        $message = "e";
        break;
    case ($score >=2 and $score <= 3):
        $message = "d";
        break;
    case ($score >=4 and $score <=5): 
        $message = "c";
        break;
    case ($score >=6 and $score <=7 ) :
        $message = "b";
        break;
    case ($score >= 8 and $score <= 9):
        $message = "a";
        break;
    case ($score == 10 ): 
        $message = "+a";
        break;
    default :
    $message = "Vous avez triché";
}

echo $message;