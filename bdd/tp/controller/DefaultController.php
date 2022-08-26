<?php
namespace Controller;

use PDO;
use Model\Database;
use Model\Seo;

class DefaultController{
    public function index(){

        //UTILISATEUR DE DATABASE:: GRACE A __callstatic de database model
        $listingUser= Database::query("select * from utilisateur")->fetchAll(PDO::FETCH_ASSOC);
        $seo = new Seo(["title"=>"Mon super site", "meta_desc" => "Ma page d'accueil est super", "keywords"=> "m2i, cours, php, framework"]);
        require_once "../views/content/index.php";
        return ["ListeUtilisateurs" => $listingUser, "seo" => $seo ];
    }


    public function error(){
        header("HTTP/1.0 410 Gone");
        $seo = new Seo(["title"=>"Erreur 404", "meta_desc" => "Ma page d'accueil est super", "keywords"=> "m2i, cours, php, framework"]);

        require_once "../views/content/error.php";
        return ["seo" => $seo];
    }

    public function paramUri($slug,$id){

        $seo = new Seo(["title"=>"test de page URI", "meta_desc" => "Ma page d'accueil est super", "keywords"=> "m2i, cours, php, framework"]);
        echo "slug = {$slug} id = {$id}";
        require_once "../views/content/index.php";
        return ["seo" => $seo];
    }

}