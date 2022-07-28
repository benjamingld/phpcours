<?php

include_once "config/setup.php";

$connexion = getPDO();

$sql1 = "SELECT * FROM utilisateur";

$sql2 = "";                                                
if(isset($_GET['user_id'])){                     //equivalent au htmlspecialchars
    $sql2 = "SELECT * FROM utilisateur WHERE id=".$connexion->quote($_GET['user_id']);
}

var_dump($sql1,$sql2);


$result = $connexion->query($sql1);

var_dump($result);

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
    <table border=1 cellpading=3>
        <?php 
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>   
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['nom']?></td>
                <td><?=$row['prenom']?></td>
                <td><?=$row['mail']?></td>
            </tr>
        <?php
        }
        ?>
    
    </table>
</body>
</html>