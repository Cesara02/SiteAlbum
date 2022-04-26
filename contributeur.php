<?php 

class contributeur {
    private $id_;
    private $nom_;
    private $artiste_;
    private $genre_;

    public function __construct($id, $nom, $artiste, $genre) {
        $this->id_ = $id;
        $this->nom_ = $nom;
        $this->artiste_ = $artiste;
        $this->genre_ = $genre;
    }

    public function getId(){
        return $this->id_;
    }

    public function getNom(){
        return $this->nom_;
    }

    public function getArtiste(){
        return $this->artiste_;
    }

    public function getGenre(){
        return $this->genre_;
    }
}

?>