<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ac2e1faec4.js" crossorigin="anonymous"></script>
     <title>Document</title>
</head>
<body>   

    <?php
        $path = ".";
        $content = scandir($path);
        
        echo "<table border=\"2px solid black\" >";

        foreach($content as $key => $value ){
            $filename = $value;
            if($value != "." and $value !=".."){
                switch ($value) {
                
                    case (is_file($value)): 
                        echo "<tr>";
                        echo "<td><i class=\"fa-solid fa-file\"></i></td>"; 
                        echo "<td>== Fichier ==</a></td>"; 
                        echo "<td><a href=\"$value\">$value</a></td>"; 
                        
                        echo "<td>".filesize($value)." octets</td>";  
                        echo  "</tr>";
                    break;
                    
                    case (is_dir($value)): 
                        echo "<tr>";
                        echo "<td><i class=\"fa-solid fa-folder\"></i></td>"; 
                        echo "<td><strong>== Dossier ==</strong></td>";  
                        echo "<td><a href=\"$value\">$value</a></td>";
                        echo "</tr>";
                    break;
                    
                }
            }
    }
        echo "</table>";
    ?>

</body>
</html>

