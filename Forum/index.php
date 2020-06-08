<?php 
    namespace App;
    
    require_once "app\Autoloader.php";
    Autoloader::register();
    use App\Session;
    use App\Router;


    define("DS",DIRECTORY_SEPARATOR);
    define("ROOT",".".DS);
    define('PUBLIC_PATH', ROOT.'public'.DS);
    define('CSS_PATH', PUBLIC_PATH.'css'.DS);
    define('IMG_PATH', PUBLIC_PATH.'img'.DS);

    define("APP_PATH",ROOT."app".DS);
    define("CONTROL_PATH", ROOT."controller".DS);
    define("MODEL_PATH", ROOT."model".DS);    
    define("VIEW_PATH", ROOT."view".DS);
    define("CLASS_PATH", ROOT."classe".DS);


    $errors = [
        "Pirate !",
        "Identifiants incorrects !",
        "Utilisateur inconnu",
        "T'as foutu quoi bordel?",
        "CSRF FFS",
        "Mots de passes invalide",
        "Les mots de passes ne correspondent pas",
        "Cette adresse email est déjà utilisée",
        "Adresse mail invalide",
        "Titre trop court",
        "Message trop court",
    ];
    
    Session::setToken();

    $token = hash_hmac("sha256","tralala",Session::getToken());
        
    if(Routeur::CsrfCheck($token))
        $result = Routeur::WhatsOnGet($_GET);
    else
        Routeur::Redirect("security", "logout","","4");


    ob_start();
    if(is_array($result))
    {
        if(array_key_exists('redir', $result) || array_key_exists('view', $result) || array_key_exists('ctrl', $result))
        {
            $data = isset($result['data']) ? $result['data'] : null;
            include VIEW_PATH.$result['view'].".php";
        }
        else include VIEW_PATH."404.html";
    }
    else include VIEW_PATH."404.html";
    $page = ob_get_contents();
    ob_end_clean();

    require VIEW_PATH."layout.php";
 

?>
    
