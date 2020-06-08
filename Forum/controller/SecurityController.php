<?php
    namespace Controller;

    use App\Session;
    use Model\MembreManager;
    use Model\SujetManager;
    use Model\MessageManager;
    use App\Routeur;

    class SecurityController{

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
                                    $ctrl = "view";
                                    return ["view" => $view,
                                            "ctrl" => $ctrl];
                            }
                            else
                                header("Location: ?error=1"); //redirection vers la page d'accueil si le pass ne correspont pas
                        }
                        else   
                            header("Location: ?error=2"); //redirection vers la page d'accueil si l'utilisateur ne correspont pas
                    }
                    catch(\Exception $e) {
                        echo $e->getMessage();  //Affichage d'une erreur
                        die();  // meurt
                    }
                }
                else
                    header("Location: ?error=1"); // Redirection vers l'accueil si les valeurs entrées sont incorectes
            }
            else if(isset($_SESSION["user"]) || isset($_COOKIE["CookieMonster"]))
                return ["view" => "forum","ctrl" => "view"];
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
            $error="";
            if(isset($_GET["error"]))
                $error="&error=".$_GET["error"];
            unset($_SESSION['user']);
            unset($_SESSION['token']);
            header("Location:?ctrl=view&redir=index".$error);
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
                        $membre_id = Session::getUser()->getId();
                        $sujet = new SujetManager();
                        $message = new MessageManager();
                        $sujet_id = $sujet->addSujet($f_titre,$membre_id);
                        $message->addMessage($f_text,$membre_id,$sujet_id);

                        $view = "post";
                        $data = $sujet_id;
                        $ctrl = "view";
                        Routeur::Redirect($ctrl,$view,$data);
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
                $f_text = trim(filter_input(INPUT_POST, "reply", FILTER_UNSAFE_RAW));
                if(strlen($f_text) > 4)
                {
                    $membre_id = Session::getUser()->getId();
                    $message = new MessageManager();
                    $message->addMessage($f_text,$membre_id,$_GET["sujet"]);
                    
                    $view = "post";
                    $data = $_GET["sujet"];
                    $ctrl = "view";
                    Routeur::Redirect($ctrl,$view,$data);
                    
                }
                else
                    header("Location: ?error=10&redir=post&id=".$_GET["sujet"]);
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

                if(!$post || $post->getMembre_id()->getId() != Session::getUser()->getId())
                {
                    $view = "post";
                    return ["view" => $view];
                }
                else
                {
                    $suj = $post->getSujet_id()->getId();
                    $message->deleteMessage($_GET["id"]);

                    $view = "post";
                    $data = $suj;
                    $ctrl = "view";
                    Routeur::Redirect($ctrl,$view,$data);
                }
                
            }
        }

        public function deleteSuj()
        {
            if(isset($_GET["id"]) && is_numeric($_GET["id"]))
            {
                $sujet = new SujetManager();
                $post=$sujet->findOneById($_GET["id"]);
                if($post && $post->getMembre_id()->getId() == Session::getUser()->getId())
                {
                    $sujet->deleteAllInSujet($_GET["id"]);
                    $sujet->deleteSujet($_GET["id"]);  
                }
                $view = "forum";
                $ctrl = "view";
                Routeur::Redirect($ctrl,$view);  
                
            }
        }
        public function verSuj()
        {
            if(isset($_GET["id"]) && is_numeric($_GET["id"]))
            {
                $sujet = new SujetManager();
                $post=$sujet->findOneById($_GET["id"]);
                if($post && Session::getUser()->getRole() =="Admin")
                {
                    if($post->getClosed())
                        $sujet->verSujet($_GET["id"],0);
                    else
                        $sujet->verSujet($_GET["id"],1);
                }
                $view = "forum";
                $ctrl = "view";
                Routeur::Redirect($ctrl,$view);  
            }
        }

        public function edit(){
            
            if(!empty($_POST) && isset($_GET["id"]) && is_numeric($_GET["id"]))
            {
                $f_text = trim(filter_input(INPUT_POST, "textmessage", FILTER_UNSAFE_RAW));
                if(strlen($f_text) > 4)
                {
                    $message = new MessageManager();
                    $post=$message->findOneById($_GET["id"]);
                    if(!$post || $post->getMembre_id()->getId() != Session::getUser()->getId())
                    {
                        $view = "post";
                        return ["view" => $view];
                    }
                    else
                    {
                        $messid = $_GET["id"];
                        $message = new MessageManager();
                        $message->editMessage($f_text,$messid);
                        
                        $view = "post";
                        $data = $message->findOneById($messid)->getSujet_id()->getId();
                        $ctrl = "view";

                        Routeur::Redirect($ctrl,$view,$data);
                    }
                    
                    
                }
                else
                    header("Location: ?error=10&redir=edit&id=".$_GET["sujet"]);
            }
            else
                header("Location: ?error=0&redir=post&id=".$_GET["sujet"]);  
         

        }

    }

    
   
?>