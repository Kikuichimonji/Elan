<?php
$color = "white";
$listePieces = ["Tour","Cavalier","Fou","Reine","Roi","Fou","Cavalier","Tour"];
    class piece{
        private $_couleur;
        private $_type;

        public function __contruct($couleur,$type){
            $this->_couleur = $couleur;
            $this->_type = $type;
        }

        public function __toString(){
            return $this->_type." ".$this->_couleur;
        }

        public function getCouleur(){
            return $this->_couleur;
        }
    }
    for($i = 0; $i<8; $i++){
        for($j = 0; $j<8; $j++){
            echo "<div style='border:1px solid;text-align:center;display:inline-block;width: 100px; height: 100px; background-color: ";
            if($color=="black"){
                echo $color."; color: white;'>"; 
                $color = "white";
            }
            else{
                echo $color."; color: black;'>"; 
                $color = "black";
            }
            $piece = new piece($j,"Blanc");
            echo $piece."</div>";
        }
        echo "<br>";
        if($color=="black")
            $color = "white";
        else
            $color = "black";

    }

?>