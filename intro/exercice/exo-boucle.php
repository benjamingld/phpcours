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
        <input type="text" placeholder="Notez un chiffre" name="chiffre" >
        <button type="submit">Envoyer</button>
    </form>

    <div>
        <table border=1 cellpadding="3">
            <?php

                $chiffre = $_GET["chiffre"] ?? "aucun";

                if(!is_int("chiffre")) {
                    
                    for ($i = 0; $i <=10 ; $i++) {
        
                        if($i% 2 == 1) {
                            echo "<tr style=\"background-color:#CCC\">";                    
                            
                            
                            echo "<td>$chiffre x $i</td>";
                            echo "<td> ".($chiffre*$i)."</td>";
                        }else {
                            echo "<tr>";
                            echo "<td>$chiffre x $i</td>";
                            echo "<td> ".($chiffre*$i)."</td>";
                        }
                    }
                    echo "</tr>";

            } else {
                    echo "{chiffre} : n'est pas un entier<br>";
            }
            ?> 
        </table>
       
    </div>
    
</body>
</html>
