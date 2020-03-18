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
            if($color=="black"){
                echo $color."; color: white;'>"; 
                $color = "white";
            }
            else{
                echo $color."; color: black;'>"; 
                $color = "black";
            }
            if ($i==0){
                $piece = new piece("Blanc",$listePieces[$j]);
                echo $piece;
            }
            else if ($i==1){
                $piece = new piece("Blanc","Pion");
                echo $piece;
            }
            else if ($i==6){
                $piece = new piece("Noir","Pion");
                echo $piece;
            }
            else if($i==7){
                $piece = new piece("Noir",$listePieces[$j]);
                echo $piece;
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