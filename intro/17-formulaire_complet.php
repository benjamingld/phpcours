<?php 

  
  include("vendor/autoload.php");
  dump($_POST);


  function convertSpace($value){
    $value = trim($value);
    $value = str_replace(" ","-",$value);
    $value = strtoupper($value);
    return $value;
  }

  $erreur="";

  //fonctionne uniquement avec l'input de type submit pour le bouton dans le formulaire 
if(isset($_POST["validate"])) {
  filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  //equivalent à :
  //$nom = htmlspecialchars($_POST["nom"]);

  //si nom existe et qu'il soit diffrent de vide sur un chaine ou on supprime les espaces avant et après.
  if(isset($_POST["prenom"]) and  !empty(trim($_POST["prenom"])) and srtlen($_POST["prenom"])>3) {
    $prenom = htmlspecialchars(($_POST["prenom"])); 
  }else {
    $erreur .= "-Prénom Invalide<br>";
  }

  //FILTRE DE FVALIDATION POUR LE MAIL
  if(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)){
    $email = htmlspecialchars(($_POST["email"])); 
  }else {
    $erreur .= "-Email Invalide<br>";
  }

  $nom = filter_input(INPUT_POST,"nom", FILTER_CALLBACK, ["option" => "convertSpace"]);
  echo $nom;

}



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
            <label>Civilité</label><br>
            <input type="radio" id="civF" name="civilite" value="madame">
            <label for="civF">Madame</label><br>
            <input type="radio" id="civM" name="civilite" value="monsieur">
            <label for="civM">Monsieur</label><br>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom"><br>
            <label for="email">Email</label>
            <input type="text" id="email" name="email"><br>
        </fieldset>
        <fieldset>
            <legend>Adresse</legend>
            <label for="voie">Adresse</label>
            <input type="text" id="voie" name="voie"><br>
            <label for="code_postal">Code postal</label>
            <input type="text" id="code_postal" name="code_postal"><br>
            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville"><br>
        </fieldset>
        <fieldset>
            <legend>Intêret</legend>
            <input type="checkbox" id="photo" name="interet[]" value="photo">
            <label for="photo">photo</label><br>
            <input type="checkbox" id="dessin" name="interet[]" value="dessin">
            <label for="dessin">dessin</label><br>
            <input type="checkbox" id="programmation" name="interet[]" value="programmation">
            <label for="programmation">programmation</label><br>
            <input type="checkbox" id="ceramique" name="interet[]" value="ceramique">
            <label for="ceramique">céramique</label><br>
            </fieldset>
        <input type="submit" name="validate" value="Valider">
        <div style="background-color:red; border-radius:10px; border:2px solid black; font-size:25px"><?php if($erreur) echo $erreur ?></div>
    </form>
</body>
</html>