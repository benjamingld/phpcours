<?php

$info = include '18-return.php';
echo $info;

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
    <?php include_once '18-noreturn.php'; ?>
    <?php echo realpath('18-noreturn.php') ."<br>"; ?>
    <?php echo __DIR__ . "<br>"; echo __FLIE__ . "<br>"; ?>
    <?php echo dirname(__DIR__); ?>
</body>
</html>