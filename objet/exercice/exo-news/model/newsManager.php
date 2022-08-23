<?php
require_once 'model/news.php';

class NewsManager{

    private $db;

    public function __construct(PDO $db){
        $this->setDb($db);
        return $this;
    }

    public function setDb($db){$this->db = $db;}

    public function getAll():array{
        $news = [];

    $request = $this->db->query("SELECT * FROM News ORDER BY id");
    while($raw = $request->fetch(PDO::FETCH_ASSOC)){
        $news[] = new News($raw);
    }
    return $news;
    }

    public function insert($titre, $description){
        $request = $this->db->prepare("INSERT INTO `news`(`titre`, `description`) VALUES (:titre, :description)");
        $request->execute([":titre"=>$titre , ":description"=>$description]);
    }
    
    public function update($titre, $description, $id){
        $request = $this->db->prepare("UPDATE `news` SET titre=:titre, description=:description WHERE id=:id");
        $request->execute([":titre"=>$titre , ":description"=>$description, ":id"=>$id]);
    }

    public function delete($id){
        $request = $this->db->prepare("DELETE FROM `news` WHERE id=:id");
        $request->execute([":id"=>$id]);
    }

}
