<?php 
    namespace App;

    abstract class Routeur
    {
        const DEFAULT_CONTROL = "view";

        public static function CsrfCheck($csrf)
        {
            try
            {
                if(!empty($_POST))
                {
                    if(isset($_POST["token"]) && !hash_equals($_POST["token"],$csrf))
                        return false;
                    return true;
                }
                return true;
            }
            catch(\Exception $e)
            {
                echo $e->getMessage();
                die();
            } 
        }

        public static function WhatsOnGet($gitgud)
        {
            $controlname = "Controller\\".self::DEFAULT_CONTROL."Controller";
            $method = "index";
            
            if (isset($gitgud["ctrl"]))
                $controlname = "Controller\\".ucfirst(strtolower($gitgud["ctrl"]))."Controller";
            if(!file_exists($controlname.".php"))
                $controlname = "Controller\\".self::DEFAULT_CONTROL."Controller";


            if(isset($_COOKIE['CookieMonster']))
                $method = "forum";
            
            if(isset($_SESSION["user"]))
                $method = "forum"; 

            $controler = new $controlname();
            if(!empty($gitgud) && isset($gitgud["redir"]) && method_exists($controler,$gitgud["redir"]))
                $method = $gitgud["redir"];

            return $controler->$method();
        }

        public static function Redirect($control = null, $redir = null, $id = null, $error = null){
            if($error)
                $error = "&error=".$error;
            if($id)
                $id = "&id=".$id;
            
            header("Location:  ?ctrl=".$control."&redir=".$redir.$id.$error);
            die();
           
        }

    }

?>