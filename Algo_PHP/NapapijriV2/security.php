<?php
    session_start();
    if(!empty($_POST))      //Si l'utilisateur vient du formulaire
    {
        $f_mail = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL)); 
        $f_password = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, [
            "options" => array("regexp"=>'/[A-Za-z0-9]{4,32}/')
        ]);                                                                             //Securisation des champs toussa
        if($f_mail && $f_password)      //Si les valeurs des champs sont correctes
        {
            require_once("connect.php");        //Connection a la BDD
            try{
                $sql="SELECT * FROM client c
                        WHERE c.email ='$f_mail'";      //Recuperation de la liste des client de la BDD correspondant au mail entré
                $stmt = $link->query($sql);      //Excecution de la requete
                $reponse = $stmt->fetch();      // Parcour de la table
                if($reponse !== false)      //Si la bdd retourne bien des données
                {
                   if(password_verify($f_password,$reponse['password']))    //Si le password match la bdd
                   {
                        $_SESSION['user'] = $reponse;   // on stock le resultat dans la session
                        header("Location: welcome.php"); //redirection vers la page welcome
                   }
                   else
                        header("Location: index.php?error=2"); //redirection vers la page d'accueil si le pass ne correspont pas
                }
            }
            catch(PDOException $e) {
                echo $e->getMessage();  //Affichage d'une erreur
                die();  // meurt
            }
        }
        else
            header("Location: index.php?error=1"); // Redirection vers l'accueil si les valeurs entrées sont incorectes
    }
    else
        header("Location: index.php?error=0"); //Si l'utilisateur est un pirate
    
?>