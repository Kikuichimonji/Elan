
<form action="?redir=postSujet&ctrl=security" method="post">
<h4><?php 
        if(!empty($_GET))
            if(isset($_GET["error"]))
                if($_GET["error"] !== false)
                    echo $errors[$_GET["error"]];
    ?></h4>
    <label for="titre">Titre de votre sujet</label>
    <input type="text" name="titre" id="titre">
    <label for="textsujet">Contenu de votre message</label>
    <input type="text" name="textsujet" id="textsujet">
    <input type="submit" value="Poster"> 
    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
</form>