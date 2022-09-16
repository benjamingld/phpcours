<?php
function regex_pattern($pattern,$texte,$all=0){
    //PREG_OFFSET_CAPTURE est un FLAG une constante qui me permet d'avoir plus d'infos sur ($matches) 
    //$matches qui est passé par référence me permet de recuperer le capture que fait preg_match dans un tableau
    if(!$all){
        if(preg_match($pattern,$texte,$matches, PREG_OFFSET_CAPTURE)){
            echo "La regex [{$pattern}] a été trouvé dans le texte {$texte}<br>";
            var_dump($matches);
            return true;
        } else {
            echo "La regex [{$pattern}] n'a pas été trouvé dans le texte {$texte}<br>";
            return false;
        }
    } else {
        if(preg_match_all($pattern,$texte,$matches, PREG_OFFSET_CAPTURE)){
            echo "La regex [{$pattern}] a été trouvé dans le texte {$texte}<br>";
            var_dump($matches);
            return true;
        } else {
            echo "La regex [{$pattern}] n'a pas été trouvé dans le texte {$texte}<br>";
            return false;
        }
    }

}




regex_pattern("/PHP/i", "J'aime bien le php, le PHP c'est cool");
regex_pattern("/PHP/", "Le js c'est cool");
regex_pattern("/web/", "je ne fais pas de webdesign");
// \b permet de verifier si mot complet
regex_pattern("/web\b/", "je ne fais pas de webdesign");
//ou
regex_pattern("/php|java/i","Le Java c'est bien quand même");
//^ debut chaine
regex_pattern("/^hello/i","Hello world");
//$ fin de chaine
regex_pattern("/world$/i","Hello world");
regex_pattern("/^hello world$/i","Hello world");
regex_pattern("/t[aio]t[aio]$/","say toto");
//sa commence par une lettre en majuscule ensuite un chiffre entre 0 et 9 ensuite il ne faut pas une lettre et ca se fini
regex_pattern("/^[A-CE-Z]*\s?[0-9]{2,5}$/i","Psfsfs 08898");



regex_pattern("/^hello/i", "Hello world");
          regex_pattern("/t[aio]{2}/i","say toto");
          regex_pattern("/(t[aio]){2}/i","say toto");
          regex_pattern("/(\w+)=\\1/i","ab=ab");
          regex_pattern("/<([A-Z][A-Z0-9]{1})\b[^>]*>.*<\/\\1>/i","<div><em>test</em></div>");
          regex_pattern("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$/i","<div><em>test</em></div>");
          regex_pattern("/(?=.*\d)/i","test1");
          regex_pattern("/\b\w+\b(?=, mais)/","Bah oui, mais bon alors voilà! oui, ok mais et alors?");
          regex_pattern("/^(?=.*\d?)(?=.*[a-z])(?=.*[A-Z]).{4,8}/i","<div><em>test</em></div>");
          regex_pattern("/\b\w{3}\b(?!, mais)/i","Bah oui, mais bon alors voilà! oui, ok mais et alors?");
          regex_pattern("/([rt]{2})([gfd]{3})/i","rtgfd");
          regex_pattern("/(?:[rt]{2})([gfd]{3})/i","rtgfd");
          
          
          $subject = "Il fait chaud";
          $pattern = "#\bchaud\b#";
          $replacement = "beau";
          echo preg_replace(
            $pattern,
            $replacement,
            $subject
          );


          $subject = "14/08/2015";
          $pattern = "#(\d{2})/(\d{2})/(\d{4})#";
          $replacement = "$3-$1-$2-$3";

        echo preg_replace(
          $pattern,
          $replacement,
          $subject
        );

        $patterns = array ("/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/",
                   "/^\s*{(\w+)}\s*=/");
$replace = array ("\\3/\\4/\\1\\2", "$\\1 =");
echo preg_replace($patterns, $replace, "{startDate} = 1999-5-27");

$patterns = array ("/t/","/l/");
$replace = array ("5", "3");
echo preg_replace($patterns, $replace, "tltltl");


