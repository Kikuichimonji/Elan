<?php
    namespace App;


    session_start();

    abstract class Session 
    {
        public static function getUser(){
            if(isset($_SESSION['user']) && $_SESSION['user'] !== null){
                return $_SESSION['user'];
            }
            return false;
        }

        public static function setUser($user){
            $_SESSION['user'] = $user;
        }

        public static function removeUser(){
            if(self::getUser()){
                unset($_SESSION['user']);
            }
            return;
        }

        public static function getToken(){
            if(isset($_SESSION["token"]))
                return $_SESSION["token"];
            else
                return false;
        }

        public static function setToken(){
            if(isset($_SESSION["token"]))
                if($_SESSION["token"] ===null)
                    $_SESSION["token"] = bin2hex(random_bytes(32));
        }

    }