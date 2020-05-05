<?php include "header.php" ?>
<main>
           
<?php
    if(isset($_SESSION['user']))
        echo "hello ".$_SESSION['user']['username'];
    else if (isset($_COOKIE["CookieMonster"]))
    {
        require_once("connect.php"); 
        try{
            $sql= "SELECT * FROM client WHERE auth = '".$_COOKIE["CookieMonster"]["data1"]."'";
            $stmt = $link->query($sql);      //Excecution de la requete
            $reponse = $stmt->fetch();      // Parcour de la table
            if($reponse === false)      //Si la bdd retourne bien des données
                echo($sql);
            //header("Location: logout.php"); //redirection vers la page d'accueil si l'utilisateur ne correspont pas 
            echo "hello test". $reponse["username"];            
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        
    }  
    else
        echo "pouet";
?>
<form action="logout.php">
    <input type="submit" value="Logout"> 
</form>

</main>
<?php include "footer.php" ?>
    <script src="script.js"></script>
