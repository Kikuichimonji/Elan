
<?php
    $table = rand ( 1 , 10 );
    
    echo"Table de ".$table." :<br>";
    for($i = 1;$i < 11;$i++)
         echo $i." x ".$table." = ".$i*$table."<br>";

    $i=0;
    echo"<br>Table de ".$table." :<br>";
    while($i < 10)
    {
        $i++;
        echo $i." x ".$table." = ".$i*$table."<br>";
    }
?>
