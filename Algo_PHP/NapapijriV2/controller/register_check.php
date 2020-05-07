<?php
    session_start();
    if(!empty($_POST) && !empty($_SESSION["token"]) && !empty($_POST["token"]) && isset($_SESSION["token"]) && isset($_POST["token"]))
    {
        if($_SESSION["token"] == $_POST["token"])
        {
            $f_nom= trim(filter_input(INPUT_POST,"nom",FILTER_SANITIZE_STRING));
            $f_prenom = trim(filter_input(INPUT_POST,"prenom",FILTER_SANITIZE_STRING));
            $f_mail = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
            $f_password1 = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, [
                "options" => array("regexp"=>'/[A-Za-z0-9]{4,32}/')
            ]);
            $f_password2 = filter_input(INPUT_POST, "password2", FILTER_VALIDATE_REGEXP, [
                "options" => array("regexp"=>'/[A-Za-z0-9]{4,32}/')
            ]);

            if (filter_var($f_mail, FILTER_VALIDATE_EMAIL)) 
            {
                if($f_nom && $f_prenom && $f_mail){
                        if($f_password1 && $f_password2)
                        {
                            if($f_password1 === $f_password2)
                            {
                                $f_password = password_hash($f_password1,PASSWORD_ARGON2I);
                                try{
                                    require_once("../model/connect.php");
                                    $sql="SELECT * FROM client c
                                        WHERE c.email ='$f_mail'";      //Recuperation de la liste des client de la BDD correspondant au mail entré
                                    $stmt = $link->query($sql);      //Excecution de la requete
                                    $reponse = $stmt->fetch(); 
                                    if($reponse === false)      //Si la bdd ne retourne des données
                                    {
                                        $sql= $link->prepare("INSERT INTO client(username,email,password,nom,prenom) VALUES (:name,:mail,:pwd,:nom,:prenom)");
                                        $sql->execute([":name" => "$f_nom$f_prenom",":mail" => "$f_mail",":pwd" => "$f_password",":nom" => "$f_nom" ,":prenom" => "$f_prenom"]);
                                        $_SESSION["user"]=$_POST;
                                        $_SESSION["user"]["username"]= $_SESSION['user']['nom'].$_SESSION['user']['prenom'];
                                        header("Location: ../view/welcome.php");
                                        die();  
                                    }
                                    else
                                        header("Location: ../view/register.php?error=5");
                                }
                                catch (PDOException $e) {
                                    echo $e->getMessage();
                                    die();
                                }
                            }
                            else
                                header("Location: ../view/register.php?error=4");
                        }   
                        else
                            header("Location: ../view/register.php?error=3");
                }
                else
                    header("Location: ../view/register.php?error=2");
            }
            else
                header("Location: ../view/register.php?error=6");
        }
        else 
            header("Location: ../view/register.php?error=0");
    }
    else
        header("Location: ../view/register.php?error=0");
?>