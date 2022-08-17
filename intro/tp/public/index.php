<?php include("../configuration/config.global.php"); ?>

<?php include("../controller/verification.php"); ?>

<?php include("../views/header.php"); ?>

<?php
    switch(strtok($_SERVER['REQUEST_URI'],"?")){
        case "/phpcours/intro/tp/index.php":
            require_once "../views/content/index.php";
            break;
        case "/phpcours/intro/tp/creation_compte.php":
            require_once "../views/content/account.php";
            break;
        case "/phpcours/intro/tp/connexion.php":
            require_once "../views/content/login.php";
            break;
        case "/phpcours/intro/tp/contact.php":
            require_once "../views/content/contact.php";
            break;
        case "/phpcours/intro/tp/profil.php":
            require_once "../views/content/profile.php";
            break;
        case "/phpcours/intro/tp/logout.php":
            require_once "../views/content/logout.php";
            break;
        default :
            echo "Erreur";
    }
?>

<?php include("../views/footer.php");?>