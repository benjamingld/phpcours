<?php 
//on simule $_POST
include("vendor/autoload.php");

    // exemple simulation
    // $arr = [
    //     "name" => "Anthony",
    //     "age" => "34",
    //     "email" => "antho@test.fr",
    // ];

    //tableau de filtre / validation

    // $filters = [
    //     "name" => [
    //         "filter" => FILTER_CALLBACK,
    //         "options" => "ucwords",
        
    //     ],
    //     "age" => [
    //         "filter" => FILTER_VALIDATE_INT,
    //         "options" => [
    //             "min_range" => 1,
    //             "max_range" => 40,
    //         ] 
    //     ],
    //     "email" => FILTER_VALIDATE_EMAIL,
    // ];
    //ASSOCIATION ENTER LES DONNEES ET LES FILTRES
    // $data = filter_var_array($arr,$filters);


//==================================================================   
//                                EXO
//================================================================== 
    
    function convertSpace($value){
        $value = trim($value);
        $value = str_replace(" ","-",$value);
        $value = strtoupper($value);
        return $value;
    };

    if(isset($_POST["validate"])){
        $filters = [
            "nom" => [
                "filter" => FILTER_CALLBACK,
                "options" => "convertSpace",
            
            ],
            "age" => [
                "filter" => FILTER_VALIDATE_INT,
                "options" => [
                    "min_range" => 15,
                    "max_range" => 50,
                ] 
            ],
            "email" => FILTER_VALIDATE_EMAIL,
        ];
  
   
    //ASSOCIATION $_POST // FILTER
    $resultat = filter_var_array($_POST,$filters);
    dump($_POST, $resultat);

 

    $error = "";

    if($resultat["nom"] == ""){
        $error .= "-Nom invalide<br>";
    };
    //equivalent en si ternaire
    $error .= (!$resultat["age"])? "-Age invalide<br>":"";

    $error .= (!$resultat["email"])? "-Email invalide":"";

  };


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <fieldset>
            <legend>Contact</legend>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom"><br>
            <label for="nom">Age</label>
            <input type="text" id="age" name="age"><br>
            <label for="iemal">Email</label>
            <input type="text" id="email" name="email"><br>
        </fieldset>

        <input type="submit" name="validate" value="Valider">
        <div style="background-color:red; font-size:20px; color:white">
            <?php 
                if(isset($_POST["validate"]) && $error != ""){
                        echo "<strong>{$error}</strong>";
                }
                 
             ?>
        </div>
    </form>
</body>
</html>