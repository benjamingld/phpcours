<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class = "container mt-3">

        <?php

// =============================================================
//                            AFFICHAGE
// =============================================================


            echo "<hr><h2>AFFICHAGE</h2>";
            
            $liens = ['Accueil', 'Produits', 'Services', 'Contact'];
            $fruits = array('pomme', 'poires', 'bananes');
            $fruits2 = array ( 0 => 'pomme' , 1 => 'poires', 2 => 'bananes');
            $personne = array ( "id" => 3 , "nom" => 'Gillard', "prenom" => 'Benjamin');

            var_dump($liens,$fruits,$fruits2,$personne);


// =============================================================
//                        MODIFICATION
// =============================================================

            echo "<hr><h2>MODIFICATION</h2>";

            $fruits[0] = "Oranges";
            $fruits[3] = "Abricot";
            //ajout a la fin du tableau
            $fruits[] = "Fraises";
            $fruits[52] = "Tomates";

            var_dump($fruits);

// =============================================================
//                          AFFICHAGE
// =============================================================

            echo "<hr><h2>AFFICHAGE</h2>";

            echo "<ul>";
                for($i=0; $i < count($liens); $i++){
                    echo "<li> $liens[$i] </li>";
                }   
            echo "</ul>";

            echo "<ul>";
                foreach($personne as $key => $value) {
                    echo "<li>Ind : ".$key." | Valeur : ".$value." </li>";
                }  
            echo "</ul>";

// =============================================================
//                     BOUGER LE CURSEUR 
// =============================================================

            echo "<hr><h2>BOUGER LE CURSEUR</h2>";

            for($i=0; $i<=count($liens); $i++) {
                //VALEUR COURANTE
                echo $i." = ".current($liens);
                //PROCHAINE VALEUR DU TABLEAU
                next($liens);
            }

            echo "<br>";
            reset($liens);
            $i = 0;

            //CUURENT VALEUR ACTUEL DE LA CASE DU TABLEUA
            //EMPTY =SI VIDE / !EMPTY =SI NON VIDE

            while(!empty(current($liens))) {
                echo $i ." = ".current($liens);
                next($liens);
                $i++;
            }


// =============================================================
//                     MANIPULATION TABLEAU 
// =============================================================
            

            echo "<hr><h2>MANIPULATION TABLEAU</h2>";

            echo "<hr><h2>AJOUT</h2>";

            $tab = ["orange", "fraise"];
            //POSSIBILITE 1 utile quand on a qu'un élément
            $tab[] = "pomme";
            //POSSIBILITE 2 plusieurs éléments
            array_push($tab, "banane", "poire", "peche");

            var_dump($tab);

            array_unshift($tab, "Citron");
            var_dump($tab);


            echo "<hr><h2>SUPPRESSION</h2>";

            //suppression
            $lasElm = array_pop($tab);
            //Ajout debut tableau
            array_unshift($tab, $lastElm);

            var_dump($tab);

            //Suppression premier element
            $firstDelete = array_shift($tab);
            var_dump($tab, $firstDelete);


        ?>

    </div>

</body>
</html>