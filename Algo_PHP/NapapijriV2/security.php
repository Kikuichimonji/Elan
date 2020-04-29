<?php   
    require_once("connect.php");
    session_start();
    if(!empty($_POST)){
        $f_mail = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
        $f_password = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, [
            "options" => array("regexp"=>'/[A-Za-z0-9]{4,32}/')
        ]);
    
        if($f_mail && $f_password){
            if($f_mail == $user["email"] && $f_password == $user["password"]){
                $_SESSION["user"] = $user;
                header("Location: connected.php");
            }
            else header("Location: index.php?error=1");
        }
        else header("Location: index.php?error=1");
    }  
    else header("Location: index.php?error=0");