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
        if($reponse === null) 
        {     //Si la bdd retourne bien des données
            header("Location: ?redir=logout"); //redirection vers la page d'accueil si l'utilisateur ne correspont pas      
            die(); 
        }    
        /*var_dump($reponse);
        die();*/
        $_SESSION['user']=$reponse;
    }  
    $sujet = new SujetManager;
    $sujets = $sujet->getAllSujet();

?>
<h1>Bienvenu sur le forum de la communautée NappapisJiren</h1>


<table class="uk-table uk-table-striped">
    <thead>
        
    </thead>
    <tbody>
        
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
        $closed ="";
        $count = $data->getNbmessage();
        /*var_dump(Session::getUser());
        die();*/
        
        if(Session::getUser()->getRole() == "Admin" || $data->getMembre()->getId() == Session::getUser()->getId())
            $adminbox="<a href='?ctrl=security&redir=deleteSuj&id=".$data->getId()."'>X</a>";
        
        if(Session::getUser()->getRole() == "Admin" )
            $adminbox=$adminbox."<a href='?ctrl=security&redir=verSuj&id=".$data->getId()."'>V</a>";

        if($data->getClosed() == 1)
            $closed ="[LOCKED]";
   
        echo "
            <tr>
                <td class=adminbox>
                    $adminbox
                </td>
                <td>
                    ".$closed." <h4 class='titre'><a href='?ctrl=view&redir=post&id=".$data->getId()."'>".$data->getTitresujet()."</a></h4>
                    <p>Par <a href='?ctrl=view&redir=membre&id=".$data->getMembre()->getId()."' class=".$data->getMembre()->getRole().">".$data->getMembre()->getUsername()."</a></p>
                </td>
                <td>
                    <p>".$count." message(s)</p>
                </td>
                <td>
                    <p>".$data->getFormatedDate()." 
                </td>
            </tr>";
            if($color == "lightgray")
                $color = "white";
            else
                $color = "lightgray";
    }
?>     
    </tbody>
</table>


<a href="?ctrl=view&redir=sujet">+ Nouveau sujet</a>


<form action="?redir=logout&ctrl=security" method="post">
    <input type="submit" value="Logout"> 
    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
</form>

</section>

