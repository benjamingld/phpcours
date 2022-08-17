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
        $connexion = getPDO();
        //PERMETTRE DE SAVOIR SI UN UTILISATEUR EXISTE

        $sql = "INSERT INTO contact (`nom`,`prenom`,`mail`,`demande`) VALUES (:nom,:prenom,:mail,:demande)";
        $prep = $connexion->prepare($sql);
        $prep->execute([
            'nom'       => $valid_data['nom'],
            'prenom'    => $valid_data['prenom'],
            'mail'      => $valid_data['mail'],
            'demande'   => $valid_data['demande']
        ]);

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
    if (!$gump->errors()){
        //JE N'AI PAS D'ERREURS
        //var_dump($valid_data);   
        //VERIFICATION BASE DE DONNEES
        $connexion = getPDO();
        $sql = "SELECT * FROM utilisateur WHERE email = ?";
        $prep = $connexion->prepare($sql);
        $prep->execute([$valid_data['mail']]);

        if($prep->rowCount()){
            $result = $prep->fetch(PDO::FETCH_ASSOC);

            if($result['password'] == $valid_data['pass']){

                $_SESSION['mail'] = $valid_data['mail'];
                $_SESSION['password'] = $valid_data['password'];
                header('Location: profil.php');
            }else {
                //PASSWORD INCORRECT
                $erreur = "Votre mot de passe est incorrect";
            }
        }else{
            //AUCUN USER
            $erreur = "Aucun compte utilisateur existe avec ce mail";
        }
    }


}


if($_SERVER['REQUEST_URI'] === "/phpcours/intro/tp/creation_compte.php"){
    $gump = new GUMP("fr");
    $erreur = "";

    // set validation rules
    $gump->validation_rules([
        'civilite'    => 'required|contains,1;2',
        'nom'         => 'required|max_len,50|min_len,3',
        'prenom'      => 'required|max_len,50|min_len,3',
        'naissance'   => 'required|date|min_age,18',
        'email'        => 'required|valid_email',
        'password'    => 'required|min_len,6'

    ]);


    // on success: returns array with same input structure, but after filters have run
    // on error: returns false
    $valid_data = $gump->run(array_map("trim",$_POST));

    //SI IL N'Y A PAS D'ERREUR
    if (!$gump->errors()) {
        //JE N'AI PAS D'ERREURS
        var_dump($valid_data);  
        //INSERTION EN BASE DE DONNEE
        $connexion = getPDO();
        //PERMETTRE DE SAVOIR SI UN UTILISATEUR EXISTE
        $sql = "SELECT * FROM utilisateur WHERE email = :email";
        $prep = $connexion->prepare($sql);
        $prep->execute(["email"=>$valid_data['email']]);
        //SI AUCUNE LIGNE ALORS USER NON EXISTANT DANS LA BDD
        if($prep->rowCount()==0){
            $sql = "INSERT INTO `utilisateur`(`civilite`,`nom`, `prenom`, `naissance`, `email`, `password`, `ip`) VALUES (:civilite,:nom,:prenom,:naissance,:email,:password,:ip)";
            $prep = $connexion->prepare($sql);
            $prep->execute([
                'civilite'      => $valid_data['civilite'],
                'nom'           => $valid_data['nom'],
                'prenom'        => $valid_data['prenom'],
                'naissance'     => $valid_data['naissance'],
                'email'         => $valid_data['email'],
                'password'      => $valid_data['password'],
                'ip'            => $_SERVER['REMOTE_ADDR']
            ]);
        } else {
            $erreur .= "Ce mail a déjà été utilisé";
        }
    }
}


if($_SERVER['REQUEST_URI'] === "/phpcours/intro/tp/logout.php"){
    session_destroy(); 
    header('Location: connexion.php'); 
}
?>