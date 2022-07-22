<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <?php 
            $chaine = "Bonjour a tous";
            //COMPTER LE NOMBRES DE CARACTERES
            echo "Nombre de caractères de $chaine : ".strlen($chaine)." <br>";
            echo "<hr>";
            echo "Lettre en position 1 : {$chaine[1]}";

            for($i=0;$i<strlen($chaine); $i++) {
                echo "{$chaine[$i]} + ";
            }

            echo "<hr>";
            //ENCRYPTAGE
            echo md5("Bonjour a tous");
            echo "<hr>";
            echo sha1 ("soleil");
            echo "<hr>";
            echo strtoupper($chaine). " ---- ". strtolower($chaine). " --- " .ucfirst($chaine);
            $chaine_info = "pizza, coca, biere, pain";
            //permet d'eploser une chaine en un tableau
            $tab_chaine_info = explode(",",$chaine_info);
            var_dump($tab_chaine_info);

            //concatenation
            $html = "<p>Bonjour</p>";
            $html .= "<p>à tous</p>";

            //permet de nettoyer la chaine de caracteres coté front.
            echo htmlspecialchars($html);

        ?>


    </div>
</body>
</html>