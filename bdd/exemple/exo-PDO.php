<?php
include_once "config/setup.php";
$co = getPDO();

$sql = "UPDATE utilisateur SET nom={$co->quote("MICHEL")}, prenom={$co->quote("Jean")} where id = 1";

$nb = $co->exec($sql);

$sql1 = "SELECT * FROM utilisateur where id = 1";

$result = $co->query($sql1);


if($nb>0){
    ob_start();

?>
        <table border=1 cellpading=3>
    
<?php 

    //methode assocciative
    $row = $result->fetch(PDO::FETCH_ASSOC)
    ?>   
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['nom']?></td>
            <td><?=$row['prenom']?></td>
            <td><?=$row['mail']?></td>
        </tr>

<?php
$result= ob_get_clean();
}else {
    ob_start();
    echo "L'utilisateur n'a pas été modifié";
    $result = ob_get_clean();
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
    <?=$result?>
</body>
</html>