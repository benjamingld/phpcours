<?php include("../model/logic.php"); ?>

<?php include("../controller/verification.php"); ?>



<?php
use AltoRouter;

    $router = new AltoRouter();
    $router->map('GET',D_ROOT, 'controller/DefaultController#index', 'home');
    $router->map('GET|POST',D_ROOT, "creation_compte.php", 'controller/UtilisateurController#creation', 'client-creation');
    $router->map('GET|POST',D_ROOT, "connexion.php", 'controller/UtilisateurController#connexion', 'client-connexion');
    $router->map('GET|POST',D_ROOT, "login.php", 'controller/ContactController#contact', 'client-contact');
    $router->map('GET|POST',D_ROOT, "logout.php", 'controller/UtilisateurController#logout', 'client-logout');
    $router->map('GET|POST',D_ROOT, "profil.php", 'controller/UtilisateurController#profil', 'client-profil');

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
    }else {
        echo "Aucune methode";
    }

    $content = ob_get_clean

?>

<?php include("../views/content/layout/canevas.php"); ?>

