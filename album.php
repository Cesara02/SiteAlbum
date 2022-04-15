<?php 

class album {
    private $id_;
    private $artiste_;
    private $genre_;

    public function __construct($id, $artiste, $genre) {
        $this->id=$id_;
        $this->artiste=$artiste_;
        $this->genre=$genre_;
    }

    public function getId(){
        return $this->id_;
    }

    public function getArtiste(){
        return $this->artiste_;
    }

    public function getGenre(){
        return $this->genre_;
    }
}

?>