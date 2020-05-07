<?php
    session_start();
    if(!empty($_POST) && !empty($_SESSION["token"]) && !empty($_POST["token"]) && isset($_SESSION["token"]) && isset($_POST["token"]))      //Si l'utilisateur vient du formulaire
    {
        if(($_SESSION["token"]) == $_POST["token"])
        {
            $f_mail = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL)); 
            $f_password = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, [
                "options" => array("regexp"=>'/[A-Za-z0-9]{4,32}/')
            ]);                                                                             //Securisation des champs toussa
            $f_passwordhash = password_hash($f_password,PASSWORD_ARGON2I);

            if($f_mail && $f_password)      //Si les valeurs des champs sont correctes
            {
                require_once("../model/connect.php");        //Connection a la BDD
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
                                if(! empty($_POST["remember"]))
                                {
                                    $auth = password_hash(random_bytes(20),PASSWORD_ARGON2I).random_bytes(20);
                                    setcookie("CookieMonster[data1]",$auth,time()+2628000,"/");
                                    $sql= $link->prepare("UPDATE client SET auth = :auth WHERE email = :email");
                                    $sql->execute([":auth" => "$auth",":email" => "$f_mail"]);
                                }
                                header("Location: ../view/welcome.php"); //redirection vers la page welcome
                        }
                        else
                                header("Location: ../index.php?error=1"); //redirection vers la page d'accueil si le pass ne correspont pas
                    }
                    else   
                        header("Location: ../index.php?error=2"); //redirection vers la page d'accueil si l'utilisateur ne correspont pas
                }
                catch(PDOException $e) {
                    echo $e->getMessage();  //Affichage d'une erreur
                    die();  // meurt
                }
            }
            else
                header("Location: ../index.php?error=1"); // Redirection vers l'accueil si les valeurs entrées sont incorectes
        }
        else
            header("Location: ../index.php?error=0");
    }
    else
        header("Location: ../index.php?error=0"); //Si l'utilisateur est un pirate
    
?>