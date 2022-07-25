<?php 
//CHARGEMENT DU SYSTEME DE DEPENDANCES
include("vendor/autoload.php");
//AFFICHAGE DU TABLEAU COMPLET $_POST
dump($_POST);

//INITIALISATION DES ERREURS
$erreur = "";

//JE VERIFIE QUE LE FORMULAIRE A ETE SOUMIS
//ET SI $_POST n'est pas vide




    if(isset($_POST) && !empty($_POST)){
        //VERIFICATION DES CHAMPS
        if(isset($_POST["age"]) and is_numeric($_POST["age"])) {
            $age = $_POST["age"];
        }else{
            $erreur .="-Votre age est invalide<br>";
        };

        if(isset($_POST["prenom"]) and strlen($_POST["prenom"])>3) {
            $prenom = $_POST["prenom"];
        }else {
            $erreur .="-Votre prenom est invalide<br>";
        };     
    }


?>

<!doctype html>
<html lang="en">
  <head>
    <title>FORMULAIRE</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
    <div class="container mt-3">
        <form method="POST">
            <div class="mb-3 row">
                <label for="inputName" class="col-xs-4 col-form-label">Votre age</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="age" id="inputAge" placeholder="Age">  
                </div>
                    
                <label for="inputName" class="col-xs-4 col-form-label">Votre Prenom</label> 
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="prenom" id="inputName" placeholder="Prenom">              
                </div>
            </div>

                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">Validé</button>
                </div>
            </div>            


                <div class="col-xs-8">
                   
                </div>
            </div>
            <?php

            if(isset($_POST)  && !empty($_POST)) {

                  if($erreur !="") {
                    echo "<div class=\"row mt-3 alert alert-danger\" role=\"alert\">";
                    echo "<strong>{$erreur}</strong>";
                    echo "</div>";
                }else {
                    echo "<div class=\"row mt-3 alert alert-success\" role=\"alert\">";
                    echo "<strong>Bonjour ".htmlspecialchars($prenom).", ".htmlspecialchars($age)." ans</strong>";
                    echo "</div>";
                }
            }
              
            ?>
  
        </form>
    </div>
    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>