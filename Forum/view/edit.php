<?php  
    Namespace View;

    use Model\MessageManager;
    use Model\Message;


    $id=$_GET["id"] ;
    $messages = new MessageManager();
    $text = $messages->findOneById($id)->getMessage();
?>

<form action="?redir=edit&ctrl=security&id=<?= $id ?>" method="post">
<h4><?php 
        if(!empty($_GET))
            if(isset($_GET["error"]))
                if($_GET["error"] !== false)
                    echo $errors[$_GET["error"]];
    ?></h4>
    <label for="textmessage">Contenu de votre message</label>
    <textarea name="textmessage" id="textmessage"><?= $text ?></textarea>
    <input type="submit" value="Editer"> 
    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
</form>