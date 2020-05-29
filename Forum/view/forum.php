<?php 
    Namespace View;

    use Model\MembreManager;
    use Model\Membre;
    use Model\SujetManager;
    use Model\Sujet;
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
    $sujet = new SujetManager;
    $sujets = $sujet->getAllSujet();

?>
<h1>Bienvenu sur le forum de la communautée NappapisJiren</h1>


<ul> 
<?php

    function randomcolor()
    {
        return "rgb(".mt_rand(0,255).",".mt_rand(0,255).",".mt_rand(0,255).")";
    }
    $color = "white";
    
    
    
    foreach($sujets as $data)
    {
        $random_color=randomcolor();
        $adminbox="";
        $userbox="";
        $count = $sujet->countMessage($data->getId_sujet());
        if($data->getMembre()->getId_membre() == Session::getUser()->getId_membre())
            $userbox="<a href='?redir=deleteSuj&id=".$data->getId_sujet()."'>X</a>";
        if(Session::getUser()->getRole() == "Admin")
        {
            $adminbox="<a href='?redir=deleteSuj&id=".$data->getId_sujet()."'>X</a>";
            $userbox="";
        }
        if($data->getClosed() == 1)
            $closed ="[LOCKED]";
        else
            $closed ="";
        echo "<li >
                <span class=adminbox>
                    $adminbox $userbox
                </span>
                <div style=\"background-color:$color\" class='liwrap'>
                    <div>".$closed." <h4 class='titre'><a href='?redir=post&id=".$data->getId_sujet()."'>".$data->getTitresujet()."</a></h4>
                        <p>Par <a href='?redir=membre&id=".$data->getMembre()->getId_membre()."' class=".$data->getMembre()->getRole().">".$data->getMembre()->getUsername()."</a></p>
                    </div>
                    <div>
                        <p>".$count." message(s)</p>
                    </div>
                    <div>
                        <p>".$data->getFormatedDate()." 
                    </div>
                </div>
             </li>";
            if($color == "lightgray")
                $color = "white";
            else
                $color = "lightgray";
    }
?>
</ul>

<a href="?redir=sujet">+ Nouveau sujet</a>


<form action="?redir=logout" method="post">
    <input type="submit" value="Logout"> 
</form>

</section>

