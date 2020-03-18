<?php
$color = "white";
$listePieces = ["Tour","Cavalier","Fou","Reine","Roi","Fou","Cavalier","Tour"];
    class piece{
        private $_couleur;
        private $_type;

        public function __construct($couleur,$type){
            $this->_couleur = $couleur;
            $this->_type = $type;
        }

        public function __toString(){
            return $this->_type." ".$this->_couleur;
        }
    }
    for($i = 0; $i<8; $i++){
        for($j = 0; $j<8; $j++){
            echo "<div style='border:1px solid;text-align:center;display:inline-block;width: 100px; height: 100px; background-color: ";
            switch($color){
                case "black" : echo $color."; color: white;'>";$color = "white";break;
                case "white" : echo $color."; color: black;'>";$color = "black";break;
                default: break;
            }
            switch($i){
                case 0 : echo $piece = new piece("Blanc",$listePieces[$j]);break;
                case 1 : echo $piece = new piece("Blanc","Pion");break;
                case 6 : echo $piece = new piece("Noir","Pion");break;
                case 7 : echo $piece = new piece("Noir",$listePieces[$j]);break;
                default: break;
            }
            echo "</div>";
        }
        echo "<br>";
        if($color=="black")
            $color = "white";
        else
            $color = "black";

    }

?>