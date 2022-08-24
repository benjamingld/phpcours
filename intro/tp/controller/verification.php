<?php
namespace Controller;
use PDO;
use GUMP;
use contact;
use PDOException;
use Model\Contact;
use Model\Manager\ContactManager;
//REDIRECT
if(!isset($_SESSION['mail']) && $_SERVER['REQUEST_URI'] === D_ROOT."profil.php"){
    header("Location: connexion.php");
}

//CONTROL
if($_SERVER['REQUEST_URI'] === D_ROOT."contact.php"){
    $erreur = "";

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
        //INSERTION EN BASE DE DONNEES

        try{
            $db = getPDO();
        $contactManager = new ContactManager($db);
        $contact = new Contact($valid_data);
        $retour = $contactManager->add($contact);
        
    }catch(PDOException $e){
        historisation(LOG_CONTACT, $e);
        $erreur = "Une erreur est survenue contacter l'administrateur ".ADMIN_MAIL;
    }
        

    }

}

if($_SERVER['REQUEST_URI'] === D_ROOT."connexion.php"){
    $erreur = "";
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
        try{
            //VERIFICATION BASE DE DONNEES
            $connexion = getPDO();
            //VERIFIER SI UN USER EXISTE
            $sql = "SELECT * FROM utilisateur WHERE email = ?";
            $prep = $connexion->prepare($sql);
            $prep->execute([$valid_data['mail']]);
            //SI UN UTILISATEUR EXISTE
            if($prep->rowCount()){
                //JE RECUPERE LE CONTENU DANS MA BASE
                $result = $prep->fetch(PDO::FETCH_ASSOC);
                //VERIFICATION SI PASSWORD DANS LA BASE ET LE MEME QUE CELUI DU FORMULAIRE
                if($result['password'] == $valid_data['pass']){
                    //SI OK CREATION SESSION ET REDIRECTION VERS PROFIL
                    $_SESSION['mail'] = $valid_data['mail'];
                    $_SESSION['pass'] = $valid_data['pass'];
                    header('Location: profil.php');
                } else {
                    //PASSWORD INCORRECT
                    $erreur = "Votre mot de passe est incorrect";
                }
            } else {
                //AUCUN USER
                $erreur = "Aucun compte utilisateur existe avec ce mail";
            }
        }catch(PDOException $e){
            historisation(LOG_UTILISATEUR, $e);
            $erreur = "Une erreur est survenue contacter l'administrateur ".ADMIN_MAIL;
        }
        
    }


}

if($_SERVER['REQUEST_URI'] === D_ROOT."creation_compte.php"){
    
    $gump = new GUMP("fr");
    $erreur = "";

    // set validation rules
    $gump->validation_rules([
        'civilite'    => 'required|contains,1;2',
        'nom'         => 'required|max_len,50|min_len,3',
        'prenom'      => 'required|max_len,50|min_len,3',
        'email'       => 'required|valid_email',
        'password'    => 'required|min_len,6',
        'naissance'   => 'required|date|min_age,18'
    ]);


    // on success: returns array with same input structure, but after filters have run
    // on error: returns false
    $valid_data = $gump->run(array_map("trim",$_POST));
    //SI IL N'Y A PAS D'ERREUR
    if (!$gump->errors()) {
        //JE N'AI PAS D'ERREURS
        // var_dump($valid_data);   
        try {
            //INSERTION EN BASE DE DONNEES
            $connexion = getPDO();
            //PERMETTRE DE SAVOIR SI UN UTILISATEUR EXISTE
            $sql = "SELECT * FROM utilisateur WHERE email = :email";
            $prep = $connexion->prepare($sql);
            $prep->execute(["email"=>$valid_data['email']]);
            //SI AUCUNE LIGNE ALORS USER NON EXISTANT DANS LA BDD
            if($prep->rowCount()==0){
                $sql = "INSERT INTO `utilisateur`(`civilite`,`nom`, `prenom`, `naissance`, `email`, `password`, `ip`) VALUES (:civilite,:nom, :prenom, :naissance, :email, :password, :ip)";
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
        }catch(PDOException $e){
            historisation(LOG_UTILISATEUR, $e);
            $erreur = "Une erreur est survenue contacter l'administrateur ".ADMIN_MAIL;
        }
        
    }
}

if($_SERVER['REQUEST_URI'] === D_ROOT."logout.php"){
    session_destroy(); 
    header('Location: connexion.php'); 
}
?>