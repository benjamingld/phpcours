<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        echo intval(42); //42
        echo "<br>";
        echo intval(4.2); //4
        echo "<br>";
        echo intval("42"); //42
        echo "<br>";
        echo intval("+42"); //42
        echo "<br>";
        echo intval("-42"); //-42
        echo "<br>";
        echo intval(042); //34 parceque cette valeur est compté sur la base de 8     64/32/16/8/1
        //                                                                          x         4 2
        //                                                                          =         3 4 
        echo "<br>";
        echo intval("042"); //42
        echo "<br>";
        echo intval(1e10); //10000000000
        echo "<br>";
        echo intval("1e10"); //10000000000
        echo "<br>";
        echo intval(0x1a); //en hexadécimal (sur la base de 16)  = 26
        echo "<br>";
        echo intval(41000000); //41000000
        echo "<br>";
        echo intval(4200000000000000000000000000000000000000000000); //0
        echo "<br>";
        echo intval("420000000000000000000000000000000000000000000000"); //9223372036854775807
        echo "<br>";
        echo intval(45,8); //45 car déjà une valeur numérique
        echo "<br>";
        echo intval("42",8); //34 car chaine de caractère
        echo "<br>";
        echo intval(array()); //0 car tableau vide
        echo "<br>";
        echo intval(array("foot","bar")); //1 car non vide
        echo "<br>";

        //Technique d'affichage sur un site e-commerce
        $test = 3;
        var_dump($test)."<br>";
        $test = (float)$test;
        var_dump($test);
        //mettre des 0 dérriere le chiffre
        echo number_format($test,2,","," "). " €";


    ?>
    
</body>
</html>
