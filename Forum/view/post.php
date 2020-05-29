<?php 
    Namespace View;

    use Model\MembreManager;
    use Model\SujetManager;
    use Model\MessageManager;
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
        Session::setUser($reponse);
    }  
    if(isset($_GET["id"]) && is_numeric($_GET["id"]))
    {
        $sujet = new SujetManager;
        $message = new MessageManager;
        $membre = new MembreManager;
        $post = $sujet->findOneById($_GET["id"]);
        if($post == false)
            header("Location: ."); 
        else
        {
            $titre=$post->getTitresujet();
            $messages = $message->getAllMessageBySujet($post->getId_sujet());
        }
    } 
    else
    {
        header("Location: .");
        die();
    }


?>
<h1><?= $titre ?></h1>
<ul>
<?php
    $color = "white";
    foreach($messages as $data)
    {
        $id = $data->getMembre_id()->getId_membre();
        $count = $membre->countMessage($id);
        $adminbox="";
        $deletclass= "";
        if($data->getDeleted())
        {
            $deletclass="deleted";
            $texte = "Message supprimé";
        }
        else
            $texte = $data->getMessage();
        if(Session::getUser()->getRole() == "Admin")
            $adminbox="<a href='?redir=deletePost&id=".$data->getId_message()."'>X</a>";

        echo "
            <li>
                <span class=adminbox>
                    $adminbox
                </span>
                <div style=\"background-color:$color \"class='liwrap'>
                    <div> 
                        <h4 class='titre'><a href='?redir=membre&id=".$id."' class=".$data->getMembre_id()->getRole().">".$membre->findOneById($id)."</a></h4>
                        <p>$count messages</p>    
                    </div>
                    <div class=".$deletclass.">
                    <p>".$texte."</p>
                    </div>
                    <div>
                        <p>Posté le : ".$data->getDatemessage()."</p>
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

<form action="?redir=postMessage&sujet=<?= $_GET["id"] ?>" method="post">
<h4><?php 
        if(!empty($_GET))
            if(isset($_GET["error"]))
                if($_GET["error"] !== false)
                    echo $errors[$_GET["error"]];
    ?></h4>
        <label for="reply">Postez une réponse</label>
        <input type="text" name="reply" id="reply">
        <input type="submit" value="Reply"> 
</form>
</section>

