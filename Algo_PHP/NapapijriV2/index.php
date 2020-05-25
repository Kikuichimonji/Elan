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

    
    if(!Session::getToken())
        Session::setToken(random_bytes(20));
    $token = hash_hmac("sha256","tralala",Session::getToken());
        
    Routeur::CsrfCheck($token);
    $result = Routeur::WhatsOnGet($_GET);

    require VIEW_PATH."layout.php";
 

?>
    
