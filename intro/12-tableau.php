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


            // =================== AJOUT ========================

            echo "<hr><h2>AJOUT</h2>";

            $tab = ["orange", "fraise"];
            //POSSIBILITE 1 utile quand on a qu'un élément
            $tab[] = "pomme";
            //POSSIBILITE 2 plusieurs éléments
            array_push($tab, "banane", "poire", "peche");

            var_dump($tab);

            array_unshift($tab, "Citron");
            var_dump($tab);

            // =================== SUPPRESSION ========================


            echo "<hr><h2>SUPPRESSION</h2>";

            //suppression
            $lasElm = array_pop($tab);
            //Ajout debut tableau
            array_unshift($tab, $lastElm);

            var_dump($tab);

            //Suppression premier element
            $firstDelete = array_shift($tab);
            var_dump($tab, $firstDelete);
// =============================================================
//                   TABLEAU ASSOCIATIFS
// =============================================================
            
            echo "<hr><h3>TABLEAU ASSOCIATIFS</h3>";

            $person = [
                "nom" => "Sébastien",
                "age" => 46
            ];

            echo "Bonjour {$person["nom"]}; tu as {$person["age"]} ans";
            //Modif
            $person["age"] = 30;
            //Ajout
            $person["taille"] = 170;

            var_dump($person);
            


// =============================================================
//                   TABLEAU ASSOCIATIFS
// =============================================================

            echo "<hr><h3>TABLEAU ASSOCIATIFS COMPLEXE</h3>";

            $test = [
                0 => [
                    "id" => 1,
                    "nom" => "Gillard",
                    "prenom" => "Benjamin",
                    "mail" => "test@test.fr",
                    "passion" => ["Foot", "Jeux vidéo", "Argent"]
                ],
                1 => [
                    "id" => 2,
                    "nom" => "Albert",
                    "prenom" => "Jean",
                    "mail" => "jean@test.fr",
                    "passion" => ["Pêche", "Tennis", "Argent"]
                ],
                2 => [
                    "id" => 3,
                    "nom" => "Lagirafe",
                    "prenom" => "Sophie",
                    "mail" => "sophie@test.fr",
                    "passion" => ["Guitare", "Basket", "Argent"]
                ]
            ];

            echo "<p>Afficher le mail de la deuxieme ligne</p>";
            echo $test[1]["mail"];
            echo "<p>Afficher à l'écran Bonjour Jean Dupont</p>";
            echo "Bonjour {$test[0]["prenom"]} {$test[0]["nom"]}";

            // ================== EXO =====================

                    echo "<hr>";
                    // Foreach pour rentrer dans le tableau Utilisateur
                    foreach($test as $nb => $infos){
                        echo "Utilisateur n°".($nb+1).": <br>";
                        echo "<ul>";
                        // Foreach pour rentrer dans les champs (nom, prenom, mail, passion) -- key = field -- value = info
                        foreach($infos as $field => $info){
                            // Lorsque que la value (info) est égale à passion, on ajoute un nouveau UL
                            if(is_array($info)){
                                echo "<li>".$field." : "."</li>";
                                echo '<ul>';
                                // For pour parcourir le tableau Passion
                                for($i = 0; $i < count($info); $i++){
                                    echo '<li>'.$info[$i]."</li>";
                                }
                                echo '</ul>';
                            // Sinon on agit normalement.
                            } else {
                                echo "<li>".$field." : ".$info."</li>";
                            }
        
                        }
                        echo "</ul>";
                    }


            
// =============================================================
//                          CLE TABLEAU
// =============================================================

            echo "<hr><h2>CLE TABLEAU</h2>";
            echo "ARRAY KEY <br>";
            var_dump($person, array_keys($person));
            //une copie de mon tableua person ou dedans j'aurai key = indexation numérique
            //value = key du tableau person
            $cleTab = array_keys($person);
            for($i=0;$i<count($cleTab); $i++ ) {
                echo $cleTab[$i]. " me permet de sortir : ". $person[$cleTab[$i]]."<br>";

            }
      
// =============================================================
//                      EXPORT TABLEAU
// =============================================================

            echo "<hr><h2>EXPORT TABLEA</h2>";

            //POUR LES TABLEAU INDEXE NUMERIQUEMENT 0,1,2,3,4
            $person = array("Seb",45,"bleu");
            //ON CREE UNE LISTE A TROU OU ON CREE DES VARIABLE EN MAPPANT LE TABLEAU PERSON
            list($nom,$age,$couleur) = $person;
            //EQUIVALENT
            $age = $person[1];

            var_dump($nom,$age,$couleur);

            //UTILISER AVEC TABLEAU ASSOCIATIF
            $person = [
                "nom" => "Anthony",
                "age" => 25
            ];

            //generer autant de variable qui y en a dans le tableau 
            //extrait du tableau les clé
            //qui vont contenir la valeur associer à la clé
            extract($person);
            echo "$name $age <br>";

            //equivalent
            $name
        ?>

    </div>

</body>
</html>