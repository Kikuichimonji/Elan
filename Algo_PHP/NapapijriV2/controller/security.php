<?php
    namespace Controller;

    use App\Session;
    use Model\UserManager;
    use App\Router;

    class Security{

        public function index()
        {
            //Session::authenticationRequired("ROLE_USER");
            $result = "connect";
            return ["view" => $result];
        }

        public function welcome()
        {
            //Session::authenticationRequired("ROLE_USER");
            $result = "welcome";
            return ["view" => $result];
        }

        public function registerform()
        {
            $result = "register";
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
                    $model = new UserManager();
                    try{
                        $reponse= $model->getUserFromMail($f_mail);   // Parcour de la table
                        if($reponse !== false)      //Si la bdd retourne bien des données
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

                                    $view = "welcome";
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
                return ["view" => "welcome"];
            else
                header("Location: ?error=0"); //Si l'utilisateur est un pirate
        }



        public function register()
        {
            if(!empty($_POST))
            {
                $f_nom= trim(filter_input(INPUT_POST,"nom",FILTER_SANITIZE_STRING));                //Securisation des champs toussa
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
                    if($f_nom && $f_prenom && $f_mail)
                    {
                        if($f_password1 && $f_password2)
                        {
                            if($f_password1 === $f_password2)
                            {
                                $model = new UserManager();
                                $f_password = password_hash($f_password1,PASSWORD_ARGON2I);
                                try
                                {
                                    $reponse= $model->getUserFromMail($f_mail);   // Parcour de la table
                                    
                                    if($reponse === false)      //Si la bdd ne retourne des données
                                    {
                                        $reponse = $model->addUser($f_nom,$f_prenom,$f_mail,$f_password);
                                        $_SESSION["user"]=$_POST;
                                        $_SESSION["user"]["username"]= $_SESSION['user']['nom'].$_SESSION['user']['prenom'];
                                        $view = "welcome";
                                        return ["view" => $view];
                                    }
                                    else
                                        header("Location: ?error=7&redir=registerform"); // If the mail is already in use
                                }
                                catch (PDOException $e) {
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

        public function listUsers(){
            Session::authenticationRequired("ROLE_ADMIN");
            $UserManager = new UserManager();
            $users = $UserManager->findAll();

            return [
                "view" => VIEW_PATH."users.php", 
                "data" => [
                    "users" => $users,
                    
                ]
            ];
        }
    }
   
?>