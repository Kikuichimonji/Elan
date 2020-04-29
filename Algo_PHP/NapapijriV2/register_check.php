<?php
    session_start();
    if(!empty($_POST)){
        $f_nom= trim(filter_input(INPUT_POST,"nom",FILTER_SANITIZE_STRING));
        $f_prenom = trim(filter_input(INPUT_POST,"prenom",FILTER_SANITIZE_STRING));
        $f_mail = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
        $f_password1 = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, [
            "options" => array("regexp"=>'/[A-Za-z0-9]{4,32}/')
        ]);
        $f_password2 = filter_input(INPUT_POST, "password2", FILTER_VALIDATE_REGEXP, [
            "options" => array("regexp"=>'/[A-Za-z0-9]{4,32}/')
        ]);
        if($f_nom && $f_prenom && $f_mail){
                if($f_password1 && $f_password2)
                {
                    if($f_password1 === $f_password2)
                    {
                        $f_password = password_hash($f_password1,PASSWORD_ARGON2I);
                        try{
                            $link = new PDO("mysql:host=localhost;dbname=client","root","",[
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                            ]);
                            $sql="INSERT INTO client(username,email,password)
                                VALUES ('$f_nom$f_prenom','$f_mail','$f_password')";
                            $sql= "INSERT INTO client(username,email,password) VALUES (:name, :pwd)";
                            $link->exec($sql); //prepare()
                            $
                        }
                        catch (PDOException $e) {
                            echo $e->getMessage();
                            die();
                        }
                        $_SESSION["user"]=$_POST;
                       // header("Location: connect.php");
                    }
                    else
                        header("Location: register.php?error=4");
                }   
                else
                    header("Location: register.php?error=3");
        }
        else
            header("Location: register.php?error=2");
    }
    else{
        header("Location: register.php?error=0");
    }
?>