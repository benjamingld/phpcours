<?php include("../configuration/config-global.php") ?>
<?php include("../controller/verification.php") ?>

<?php include("../layout/header.php"); ?>

    <h1>Profil</h1>
    <p>INFO USER</p>

    Vous êtes sur la session de <?=htmlspecialchars($_SESSION["mail"])?>
    <br>
    Votre mot de passe est <?=htmlspecialchars($_SESSION["pass"])?>
    
 

<?php include("../layout/footer.php");?>