<?php



//==============================================
//                 REDIRECT
//==============================================

if(!isset($_SESSION["mail"]) && $_SERVER['REQUEST_URI'] === "/phpcours/intro/TPlong/profil.php"){
    header("location: connexion.php");
}




//==============================================
//                  CONTROL
//==============================================


//======================  CONNEXION ========================


if($_SERVER['REQUEST_URI'] == "/connexion.php"){

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
//====================== INSCRIPTION ====================== 


if($_SERVER['REQUEST_URI'] == "/inscription.php"){

    $gump = new GUMP("fr");
    
    // set validation rules
    $gump->validation_rules([
        'civilite'    => 'required|contains,Monsieur;Madame',
        'nom'         => 'required|min_len,3|max_len,10',
        'prenom'      => 'required|min_len,3|max_len,10',
        'age'         => 'required|integer',
        'mail'       => 'required|valid_email'
    ]);
    
    
    // on success: returns array with same input structure, but after filters have run
    // on error: returns false
    $valid_data = $gump->run(array_map("trim",$_POST));
    
    //SI IL N'Y A PAS D'ERREUR
    if (!$gump->errors()) {
        $valid_data;   
        header("location: connexion.php");
    }
}

//======================  CONTACT ====================== 


if($_SERVER['REQUEST_URI'] == "/contact.php"){

    $gump = new GUMP('fr');
    
    $gump->validation_rules([
        'nom'         => 'required|min_len,3|max_len,10',
        'prenom'      => 'required|min_len,3|max_len,10',
        'mail'       => 'required|valid_email',
        'tel'       => 'required|min_len,10|max_len,10',
        'demande'       => 'required'
    ]);
}

//====================== HOME ======================  


// if($_SERVER['REQUEST_URI'] == "/phpcours/intro/TPlong/public/home.php"){


// }

//====================== PROFIL ======================


// if($_SERVER['REQUEST_URI'] == "/phpcours/intro/TPlong/public/profil.php"){


// }

//====================== LOGOUT ======================


if($_SERVER['REQUEST_URI'] == "/logout.php"){

    session_destroy();
    header("location:connexion.php");
}

?>