<?php
    require_once("../model/UserModel.php");
    session_start();
    class Security{

        private $model;
        
        public function __construct(){
            
            $this->model = new UserModel();
        }

        public function connect(){
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
                    try{
                        $reponse= $this->model->getUserFromMail($f_mail);   // Parcour de la table
                        if($reponse !== false)      //Si la bdd retourne bien des données
                        {
                            if(password_verify($f_password,$reponse['password']))    //Si le password match la bdd
                            {
                                    $_SESSION['user'] = $reponse;   // on stock le resultat dans la session
                                    if(! empty($_POST["remember"]))
                                    {
                                        $auth = password_hash(random_bytes(20),PASSWORD_ARGON2I).random_bytes(20);
                                        setcookie("CookieMonster[data1]",$auth,time()+2628000,"/");
                                        $this->model->setAuth($auth,$f_mail);
                                    }
                                    header("Location: ../view/welcome.php"); //redirection vers la page welcome
                            }
                            else
                                    header("Location: index.php?error=1"); //redirection vers la page d'accueil si le pass ne correspont pas
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
                    header("Location: index.php?error=1"); // Redirection vers l'accueil si les valeurs entrées sont incorectes
            }
            else
                header("Location: index.php?error=0");
        }
        else
            echo $_SESSION['token']." && ".$_POST['token']." && isset(".$_SESSION['token'].") && isset(".$_POST['token'].")";
            //header("Location: index.php?error=0"); //Si l'utilisateur est un pirate
        }
    }

    $secu = new Security();
    $secu->connect();
    
    
    
?>