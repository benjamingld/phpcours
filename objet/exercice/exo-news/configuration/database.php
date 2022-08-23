<?php

    $dsn = "mysql:host=localhost;dbname=tp_news;charset=utf8;port=3306";
    $user = "root";
    $pass = "";
    $connexion = new PDO($dsn,$user,$pass);
    $newsManager = new NewsManager($connexion);