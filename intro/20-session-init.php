<?php
    session_start();

    if(isset($_POST['send'])) {
        //VERIFICATION DES DONNEES DU FORMAILAIRE
        //...
        //VERIFICATION A LA BASE DE DONNEES
        //...
        //AJOUT D'INFORMATION DANS UN FICHIER LOG
        //...
        //GENERATION DE AM SESSION
        $_SESSION["mail"] = $_POST ["login"];
        $_SESSION["pass"] = $_POST ["password"];
        var_dump($_SESSION);


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
    <form action="" method="post">
        <input type="text" name="login" id="">
        <input type="password" name="password" id="">
        <input type="submit"name="send"  value="Envoyer">
    </form>
    <?php if(isset($_SESSION["mail"]) && isset($_SESSION["pass"])) {
        echo "<a href='20-session-end.php' >Info User</a>";
    }

    ?>
    
</body>
</html>