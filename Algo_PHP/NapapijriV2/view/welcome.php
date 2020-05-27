<?php 
    Namespace View;

    use Model\UserModel;
    use Model\User;
    use App\Session;
    use Model\Compte;
  


    $tab_compte = array();
?>
<section>
           
<?php

    if (isset($_COOKIE["CookieMonster"]))
    {
        $model = new UserModel;
        $reponse = $model->welcome_check($_COOKIE["CookieMonster"]);
        if($reponse === false) 
        {     //Si la bdd retourne bien des données
            header("Location: ?redir=logout"); //redirection vers la page d'accueil si l'utilisateur ne correspont pas      
            die(); 
        }    
        $_SESSION['user']=$reponse;
    }  

    if(isset($_SESSION['user']))
    { 
        $model = new UserModel;
        $mail = $_SESSION['user']['email'];
        $reponse = $model->welcome_fill_client($mail);
        $client = new User($reponse);
        $reponse = $model->welcome_fill_account($mail);
        foreach($reponse as $key => $data)
            $tab_compte[]= new Compte($data,$client);
    }
    
    echo $client->getInfo();
    foreach($tab_compte as $compte)
        echo $compte->getInfo();
?>
<form action="?redir=logout" method="post">
    <input type="submit" value="Logout"> 
</form>

</section>

