<?php
    function redirection($url, $permanent = false){
        //($permanent)?301:302;
        //si 301 redirection definitive
        //si 302 redirection temporaire

        header('location' . $url, true, ($permanent)?301:302);
    };

    redirection("17-upload.php", true);
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
    <!-- <script>location.href="https://www.commentcamarche.net";</script>
     -->
</body>
</html>