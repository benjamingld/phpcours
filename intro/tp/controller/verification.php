<?php
//REDIRECT
if(!isset($_SESSION['mail']) && $_SERVER['REQUEST_URI'] === "/phpcours/intro/tp/profil.php"){
    header("Location: connexion.php");
}


//CONTROL
if($_SERVER['REQUEST_URI'] === "/phpcours/intro/tp/contact.php"){

    $gump = new GUMP("fr");

    // set validation rules
    $gump->validation_rules([
        'nom'           => 'required|max_len,50|min_len,3',
        'prenom'        => 'required|max_len,50|min_len,3',
        'mail'          => 'required|valid_email',
        'demande'       => 'required|min_len,2',
    ]);


    // on success: returns array with same input structure, but after filters have run
    // on error: returns false
    $valid_data = $gump->run(array_map("trim",$_POST));

    //SI IL N'Y A PAS D'ERREUR
    if (!$gump->errors()) {
        //JE N'AI PAS D'ERREURS
        var_dump($valid_data);   
        //INSERTION EN BASE DE DONNEES
    }

}

if($_SERVER['REQUEST_URI'] === "/phpcours/intro/tp/connexion.php"){
    $gump = new GUMP("fr");

    // set validation rules
    $gump->validation_rules([
        'mail'           => 'required|valid_email',
        'pass'           => 'required|min_len,6',
    ]);


    // on success: returns array with same input structure, but after filters have run
    // on error: returns false
    $valid_data = $gump->run(array_map("trim",$_POST));

    //SI IL N'Y A PAS D'ERREUR
    if (!$gump->errors()) {
        //JE N'AI PAS D'ERREURS
        //var_dump($valid_data);   
        //VERIFICATION BASE DE DONNEES
        $bdd =[
            "mail" => "test@test.fr",
            "pass" => "123456"
        ];
        //VERIFICATION OK
        if($valid_data['mail'] == $bdd['mail'] && $valid_data['pass'] == $bdd['pass'] ){
            //CREATION DE LA SESSION
            $_SESSION['mail'] = $valid_data['mail'];
            $_SESSION['pass'] = $valid_data['pass'];
            //REDIRECTION
            header('Location: profil.php');
        } else {
            $erreur = "Votre identifiant / mdp est incorrect";
        }
    }


}


if($_SERVER['REQUEST_URI'] === "/phpcours/intro/tp/creation_compte.php"){
    $gump = new GUMP("fr");

    // set validation rules
    $gump->validation_rules([
        'civilite'    => 'required|contains,Monsieur;Madame',
        'nom'         => 'required|max_len,50|min_len,3',
        'prenom'      => 'required|max_len,50|min_len,3',
        'age'         => 'required|integer',
        'mail'       => 'required|valid_email'
    ]);


    // on success: returns array with same input structure, but after filters have run
    // on error: returns false
    $valid_data = $gump->run(array_map("trim",$_POST));

    //SI IL N'Y A PAS D'ERREUR
    if (!$gump->errors()) {
        //JE N'AI PAS D'ERREURS
        var_dump($valid_data);  
        
        $bd = "INSERT INTO utilisateur (`civilité`,`nom`,`prenom`,`age`,`email`) VALUES ($_POST(['civilité']), $_POST(['nom']), $_POST(['prenom']), $_POST(['age']), $_POST(['email']))";
    }
}


if($_SERVER['REQUEST_URI'] === "/phpcours/intro/tp/logout.php"){
    session_destroy(); 
    header('Location: connexion.php'); 
}
?>