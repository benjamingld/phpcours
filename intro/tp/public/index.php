<?php include("../configuration/config.global.php"); ?>

<?php include("../model/logic.php"); ?>

<?php include("../controller/verification.php"); ?>

<?php include("../views/header.php"); ?>


<?php
    switch(strtok($_SERVER['REQUEST_URI'],"?")){
        case D_ROOT:
            require_once "../views/content/index.php";
            break;
        case D_ROOT."creation_compte.php":
            require_once "../views/content/account.php";
            break;
        case D_ROOT."connexion.php":
            require_once "../views/content/login.php";
            break;
        case D_ROOT."contact.php":
            require_once "../views/content/contact.php";
            break;
        case D_ROOT."profil.php":
            require_once "../views/content/profile.php";
            break;
        case D_ROOT."logout.php":
            break;
        default :
            require_once "../views/content/error.php";
            break;
    }
?>

<?php include("../views/footer.php");?>