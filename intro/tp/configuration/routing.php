


<?php

    $router = new AltoRouter();
    $router->map('GET',D_ROOT,'Controller\DefaultController#index', 'home');
    $router->map('GET|POST',D_ROOT."creation_compte",'Controller\UtilisateurController#creation', "client-creation");
    $router->map('GET|POST',D_ROOT."connexion",'Controller\UtilisateurController#connexion', "client-connexion");
    $router->map('GET|POST',D_ROOT."contact",'Controller\ContactController#demande', "demande-contact");
    $router->map('GET',D_ROOT."profil",'Controller\UtilisateurController#profil', "profil-user");
    $router->map('GET',D_ROOT."logout",'Controller\UtilisateurController#logout', "client-logout");
    $router->map('GET',D_ROOT."test/[*:slug]/[i:id]",'Controller\DefaultController#paramUri', "test-uri");

    $match = $router->match();

    // dump($match);
    //LANCE LA TEMPORISATION
    ob_start();
    if($match===false){
        //LANCE LA METHODE ERROR DE DEFAULTCONTROLLER
        //$content recupere le retour de ma methode
        $retour = call_user_func_array([new Controller\DefaultController,"error"],[]);
    } else {
        //$match[0] = $controller $match[1] = $method
        list($controller,$method) = explode('#',$match['target']);
        //$controller = new controller/defaultController
        $controller = new $controller;
        //EST ce que dans cet objet il y a la method $method (ici index)
        if(is_callable([$controller,$method])){
            //SI la methode existe je la lance donc $controller->index();
           $retour =  call_user_func_array([$controller,$method],$match['params']);
        } else {
            echo "AUCUNE METHODE";
        }
    }

    $content = ob_get_clean();
    
?>


<?php include("../views/layout/canevas.php"); ?>
use AltoRouter;
