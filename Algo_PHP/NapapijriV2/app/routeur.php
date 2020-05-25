<?php 
    namespace App;

    abstract class Routeur
    {
        const DEFAULT_CONTROL = "security";

        public static function CsrfCheck($csrf)
        {
            try
            {
                if(isset($_POST["token"]) && !hash_equals($_POST["token"],$csrf))
                {
                    //var_dump(hash_equals($_POST["token"],$csrf));
                    throw new \Exception("ACHTUNG BICYCLETTE!!!");
                }
            }
            catch(\Exception $e)
            {
                echo $e->getMessage();
                die();
            } 

        }

        public static function WhatsOnGet($gitgud)
        {
            $controlname = "Controller\\".self::DEFAULT_CONTROL;
            $method = "index";
            
            if (isset($gitgud["ctrl"]))
                $controlname = ucfirst(strtolower($gitgud["ctrl"]));

            $controler = new $controlname();
            if(isset($_COOKIE['CookieMonster']))
                $method = "welcome";
            

            if(isset($_SESSION["user"]))
                $method = "connect"; 

            if(!empty($gitgud) && isset($gitgud["redir"]) && method_exists($controler,$gitgud["redir"]))
                $method = $gitgud["redir"];

            return $controler->$method();
        }

        public static function Redirect($control = null, $method = null){

            header("Location:  ?ctrl=".$control."&method=".$method);
            die();
           
        }

    }

?>