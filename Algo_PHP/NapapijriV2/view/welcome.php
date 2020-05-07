<?php include "../src/header.php" ?>
<?php include "../classe/class_Compte.php" ?>
<?php include "../classe/class_Titulaire.php" ?>
<?php include "../model/welcome_fill.php" ?>
<?php 
    $connected   = 0; 
    $tab_compte = array();
?>
<main>
           
<?php
    if(isset($_SESSION['user']))
        $connected =1;
    else if (isset($_COOKIE["CookieMonster"]))
    {
        $reponse = welcome_check($_COOKIE["CookieMonster"]["data1"],$link);
        if($reponse !== false) 
        {     //Si la bdd retourne bien des données
            header("Location: ../view/logout.php"); //redirection vers la page d'accueil si l'utilisateur ne correspont pas      
            die(); 
        }    
        $connected =1;
        $_SESSION['user']=var_dump($reponse);
    }  
    else
       var_dump($_COOKIE);

    if($connected)
    {
        require_once("../model/connect.php"); 
        $mail = $_SESSION['user']['email'];
        $reponse = welcome_fill_client($mail,$link);
        $client = new Titulaire($reponse['prenom'],$reponse['nom'],"1988-11-19","Munster");
        $reponse = welcome_fill_account($mail,$link);
        foreach($reponse as $key => $data)
            $tab_compte[]= new Compte($data["libelee_compte"],$data["solde"],"euro",$client);
    }
    
    echo $client->getInfo();
    foreach($tab_compte as $compte)
        echo $compte->getInfo();
?>
<form action="logout.php">
    <input type="submit" value="Logout"> 
</form>


</main>
<?php include "../src/footer.php" ?>
    <script src="script.js"></script>
