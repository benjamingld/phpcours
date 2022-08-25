<?php include("../configuration/config.global.php"); ?>

<?php include("../model/logic.php"); ?>

<?php include("../controller/verification.php"); ?>

<?php include("../views/header.php"); ?>

<?php
use AltoRouter;

    $router = new AltoRouter();
    $router->map('GET',D_ROOT, 'controller/DefaultController#index', 'home');
    $router->map('GET|POST',D_ROOT, "creation_compte.php", 'controller/UtilisateurController#creation', 'client-creation');
    $router->map('GET|POST',D_ROOT, "connexion.php", 'controller/UtilisateurController#connexion', 'client-connexion');
    $router->map('GET|POST',D_ROOT, "login.php", 'controller/ContactController#contact', 'client-contact');
    $router->map('GET|POST',D_ROOT, "logout.php", 'controller/UtilisateurController#logout', 'client-logout');
    $router->map('GET|POST',D_ROOT, "logout.php", 'controller/UtilisateurController#logout', 'client-logout');

    $match = $router->match();
    var_dump($match);

    //$match[0] = $controller et $match[1] = $method.
    list($controller, $method) = explode('#', $match['target']);
    //$controller = new controller/defaultController
    $controller = new $controller;
    //EST ce  qurdans cet objet il y a la method $method (ici index)
    if(is_callable($controller, $method)){
        //si la method existe, je la lance donc $controller index
        call_user_func_array([$controller, $method],$match['params']);
    }

    // switch(strtok($_SERVER['REQUEST_URI'],"?")){

    //     case D_ROOT."connexion.php" : 
    //         require_once "../views/content/connexion.php";
    //         break;
    //     case D_ROOT."contact.php" : 
    //         require_once "../views/content/contact.php";
    //         break;
    //     case D_ROOT."profil.php" : 
    //         require_once "../views/content/profil.php";
    //         break;       
    //     default :
    //         header('HTTP/1.0 404 Not Found');
    //         require_once "../views/content/error.php";
    // }
?>

<?php include("../views/footer.php");?>

