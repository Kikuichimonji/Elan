<?php 
    Namespace View;

    use Model\MembreManager;
    use Model\SujetManager;
    use App\Session;
?>
<section>
           
<?php

    if (isset($_COOKIE["CookieMonster"]))
    {
        $membre = new MembreManager;
        $reponse = $membre->auth_check($_COOKIE["CookieMonster"]);
        if($reponse === false) 
        {     //Si la bdd retourne bien des données
            header("Location: ?redir=logout"); //redirection vers la page d'accueil si l'utilisateur ne correspont pas      
            die(); 
        }    
        $_SESSION['user']=$reponse;
    }  
    if(isset($_GET["id"]) && is_numeric($_GET["id"]))
    {
        $membre = new MembreManager;
        $user = $membre->findOneById($_GET["id"]);
        if($user == false)
            header("Location: ."); 
        else
        {
            $pseudo = $user->getUsername();
            $inscription = $user->getDateinscription();
            $nbsujet = $membre->countSujet($_GET["id"]);
            $nbmessage = $membre->CountMessage($_GET["id"]);;
        }
    } 
    else
    {
        header("Location: .");
        die();
    }


?>
<h1>Profil de <?= $pseudo ?></h1>
<p> Inscrit depuis le : <?= $inscription ?></p>
<p> Post : <?= $nbsujet ?></p>
<p> Messages : <?= $nbmessage ?></p>


</section>

