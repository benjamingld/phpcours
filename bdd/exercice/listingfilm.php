<!-- 
CREE UN FORMULAIRE AVEC UN CHAMPS + SUBMIT
CHAMPS DE TYPE TEXT
EN FONCTION DE LA SAISIE 1,2,3,4 VOUS AFFICHER LES DONNEE DU FILM AVEC L'image
SI LE FILM EXISTE PAS VOUS AFFICHER UNE ERREUR -->

<?php
include_once "../exemple/config/setup.php";
$connexion = getPDO();

if(isset($_GET['id_film']) and !empty($_GET)){
    
    $sql ="SELECT * FROM film WHERE id=?";
    $stm = $connexion->prepare($sql);
    $stm->execute([$_GET['id_film']]);
}else{
    echo "Veuillez entrer l'id !!!!";
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
    <form action="" method="get">
        <input type="text" name="id_film" id="id_film">
        <input type="submit" value="Rechercher">
    </form>

    <table border=1 cellpading=3>

        <?php
        if(isset($_GET['id_film']) and !empty($_GET)){
        while($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        ?>   
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['titre']?></td>
            <td><?=$row['description']?></td>
            <td><?=$row['date_parution']?></td>
            <td><img style="max-width : 300px" src="<?=$row['photo']?>"></td>

        </tr>   
    </table>
        <?php
        }
        }
        ?>
    
 

</body>
</html>
