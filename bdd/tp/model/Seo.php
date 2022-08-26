<?php
namespace Model;

class Seo{
    public $title;
    public $meta_desc;
    public $keywords;
    

    public function hydrate(array $donnees)
    {
    foreach ($donnees as $key => $value)
    {
        $method = 'set'.ucfirst($key);
    (method_exists($this,$method))?$this->$method($value):0;
    }
    }

    public function __construct(array $donnees)
    {
    $this->hydrate($donnees);
    }
    /**
     * Get the value of keywords
     */ 
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set the value of keywords
     *
     * @return  self
     */ 
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get the value of meta_desc
     */ 
    public function getMeta_desc()
    {
        return $this->meta_desc;
    }

    /**
     * Set the value of meta_desc
     *
     * @return  self
     */ 
    public function setMeta_desc($meta_desc)
    {
        $this->meta_desc = $meta_desc;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}