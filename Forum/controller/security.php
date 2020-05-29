<?php
    namespace Controller;

    use App\Session;
    use Model\MembreManager;
    use Model\SujetManager;
    use Model\MessageManager;
    use App\Router;

    class Security{

        public function index()
        {
            $result = "connect";
            return ["view" => $result];
        }

        public function forum()
        {
            $result = "forum";
            return ["view" => $result];
        }

        public function sujet()
        {
            $result = "sujet";
            return ["view" => $result];
        }

        public function registerform()
        {
            $result = "register";
            return ["view" => $result];
        }

        public function membre()
        {
            $result = "membre";
            return ["view" => $result];
        }

        public function post()
        {
            $result = "post";
            return ["view" => $result];
        }

        public function connect()
        {
            if(!empty($_POST))     
            {   
                $f_mail = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL)); 
                $f_password = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, [
                    "options" => array("regexp"=>'/[A-Za-z0-9]{4,32}/')
                ]);                                                                             //Securisation des champs toussa
                $f_passwordhash = password_hash($f_password,PASSWORD_ARGON2I);

                if($f_mail && $f_password)      //Si les valeurs des champs sont correctes
                {
                    $model = new MembreManager();
                    try{
                        $reponse= $model->getMembreFromMail($f_mail);   // Parcour de la table
                        if($reponse !== null)      //Si la bdd retourne bien des données
                        {
                            if(password_verify($f_password,$reponse->getPassword()))    //Si le password match la bdd
                            {
                                    Session::setUser($reponse) ;   // on stock le resultat dans la session
                                    if(! empty($_POST["remember"]))
                                    {
                                        $auth = password_hash(random_bytes(20),PASSWORD_ARGON2I).random_bytes(20);
                                        setcookie("CookieMonster",$auth,time()+2628000,"/");
                                        $model->setAuth($auth,$f_mail);
                                    }

                                    $view = "forum";
                                    return ["view" => $view];
                            }
                            else
                                header("Location: ?error=1"); //redirection vers la page d'accueil si le pass ne correspont pas
                        }
                        else   
                            header("Location: ?error=2"); //redirection vers la page d'accueil si l'utilisateur ne correspont pas
                    }
                    catch(PDOException $e) {
                        echo $e->getMessage();  //Affichage d'une erreur
                        die();  // meurt
                    }
                }
                else
                    header("Location: ?error=1"); // Redirection vers l'accueil si les valeurs entrées sont incorectes
            }
            else if(isset($_SESSION["user"]) || isset($_COOKIE["CookieMonster"]))
                return ["view" => "forum"];
            else
                header("Location: ?error=0"); //Si l'utilisateur est un pirate
        }



        public function register()
        {
            if(!empty($_POST))
            {
                $f_username= trim(filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING));                //Securisation des champs toussa
                $f_mail = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
                $f_password1 = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, [
                    "options" => array("regexp"=>'/[A-Za-z0-9]{4,32}/')
                ]);
                $f_password2 = filter_input(INPUT_POST, "password2", FILTER_VALIDATE_REGEXP, [
                    "options" => array("regexp"=>'/[A-Za-z0-9]{4,32}/')
                ]);

                if (filter_var($f_mail, FILTER_VALIDATE_EMAIL)) 
                {
                    if($f_username && $f_mail)
                    {
                        if($f_password1 && $f_password2)
                        {
                            if($f_password1 === $f_password2)
                            {
                                $model = new MembreManager();
                                $f_password = password_hash($f_password1,PASSWORD_ARGON2I);
                                try
                                {
                                    $reponse= $model->getMembre($f_username);   // Parcour de la table
                                    
                                    if($reponse === null)      //Si la bdd ne retourne des données
                                    {
                                        $reponse = $model->addMembre($f_username,$f_mail,$f_password);
                                        Session::setUser($model->getMembre($f_username));
                                        $view = "forum";
                                        return ["view" => $view];
                                    }
                                    else
                                        header("Location: ?error=7&redir=registerform"); // If the mail is already in use
                                }
                                catch (\PDOException $e) {
                                    echo $e->getMessage();
                                    die();
                                }
                            }
                            else
                                header("Location: ?error=6&redir=registerform"); // If the passwords don't match
                        }   
                        else
                            header("Location: ?error=5&redir=registerform");   // If the passwords are rejected by the regex 
                    }
                    else
                        header("Location: ?error=2&redir=registerform");      // If the filled inputs are not valid 
                }
                else
                    header("Location: ?error=8&redir=registerform");       //If the mail format is not valid
            }
            else 
                header("Location: ?error=0&redir=registerform");    //If the user is used to say "YaRrr"
        }

        public function logout()
        {
            if(isset($_COOKIE['CookieMonster']))
            {
                setcookie("CookieMonster",$value,time()-3600,"/");
            }
            unset($_SESSION['user']);
            unset($_SESSION['token']);
            header("Location:?redir=index");
        }

        public function postSujet()
        {
            if(!empty($_POST))
            {
                $f_titre= trim(filter_input(INPUT_POST,"titre",FILTER_SANITIZE_STRING));                //Securisation des champs toussa
                $f_text = trim(filter_input(INPUT_POST, "textsujet", FILTER_SANITIZE_STRING));
                if(strlen($f_titre) > 4)
                {
                    if(strlen($f_text) > 4)
                    {
                        $membre_id = Session::getUser()->getId_membre();
                        $sujet = new SujetManager();
                        $message = new MessageManager();
                        $message->addMessage($f_text,$membre_id,$sujet->addSujet($f_titre,$membre_id));

                        $view = "forum";
                        return ["view" => $view];
                    }
                    else
                        header("Location: ?error=10&redir=sujet");  
                }
                else
                    header("Location: ?error=9&redir=sujet");
            }
            else
                header("Location: ?error=0&redir=sujet");   
        }

        public function postMessage()
        {
            if(!empty($_POST) && isset($_GET["sujet"]) && is_numeric($_GET["sujet"]))
            {
                $f_text = trim(filter_input(INPUT_POST, "reply", FILTER_SANITIZE_STRING));
                if(strlen($f_text) > 4)
                {
                    $membre_id = Session::getUser()->getId_membre();
                    $message = new MessageManager();
                    $message->addMessage($f_text,$membre_id,$_GET["sujet"]);
                    
                    $view = "post";
                    return ["view" => $view];
                    
                }
                else
                    header("Location: ?error=10&redir=post&id=".$_GET["sujet"]);
                    //var_dump(strlen($f_text)); die();
            }
            else
                header("Location: ?error=0&redir=post&id=".$_GET["sujet"]);  
         
        }

        public function deletePost()
        {
            if(isset($_GET["id"]) && is_numeric($_GET["id"]))
            {
                $message = new MessageManager();
                $post=$message->findOneById($_GET["id"]);
                if($post == false)
                {
                    $view = "post";
                    return ["view" => $view];
                }
                else
                {
                    $message->deleteMessage($_GET["id"]);

                    $view = "post";
                    return ["view" => $view];  
                }
                
            }
        }

        public function deleteSuj()
        {
            if(isset($_GET["id"]) && is_numeric($_GET["id"]))
            {
                $sujet = new SujetManager();
                $post=$sujet->findOneById($_GET["id"]);
                if($post == false)
                {
                    $view = "forum";
                    return ["view" => $view];
                }
                else
                {
                    $sujet->deleteAllInSujet($_GET["id"]);
                    $sujet->deleteSujet($_GET["id"]);
                    $view = "forum";
                    return ["view" => $view];  
                }
                
            }
        }

    }

    
   
?>