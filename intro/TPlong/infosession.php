<?php include("mise-en-page/header.php"); ?>

<?php
    session_start();


?>

    Vous êtes sur la session de <?=htmlspecialchars($_SESSION["mail"])?>
    <br>
    <a href='suppressionsession.php'>Se déconnecter</a>


<?php include("mise-en-page/footer.php");?>