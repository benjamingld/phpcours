<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
        $nom = 'MORIN';
        $prenom = 'Isabelle';
        $age = 25;
        $pri = 5.3;
        $distance = 5e16;
        $test = true;

        echo "Son nom est : ".$nom.", son prénom est : ".$prenom;

        var_dump($nom);

        $nom = 14;

        var_dump($nom);

        echo 'methode 1 : '.$nom." ".$prenom;
    ?>
    <hr>
    <?= 'Methode 1 bis: '.$nom." ".$prenom ?>
    <hr>
    <?= "Methode 2 : $prenom $nom" ?>
    <hr>
    <?php 
        printf('Methode 3 : Bonjour %s %s vous avez %d ans <br>', $prenom, $nom, $age)
    ?>
    <hr>
    <?= "Methode 4 : {$prenom} {$nom}" ?>
        

</body>
</html>