
<section>
    <form action="?redir=register" method="post" >
        <h3>Créer un compte</h3>
        <h4>
            <?php 
                if(!empty($_GET))
                    if(isset($_GET["error"]))
                        if($_GET["error"] !== false)
                            echo $errors[$_GET["error"]];
            ?>
        </h4>
        <label for="nom">*Nom :</label>
        <input type="text" name="nom" required>
        <label for="prenom">*Prenom :</label>
        <input type="text" name="prenom" required>
        <label for="email">*Email :</label>
        <input type="text" name="email" required>
        <label for="password">*Password :</label>
        <input type="password" name ="password" id="password1" required>
        <label for="password2">*Confirmer le password : <span id="failpass"></span></label>
        <input type="password" name ="password2" id="password2" required>
        <div class="check">
            <input type="checkbox" name="pub" id="pubs">
            <label for="pubs">Tu veux encore plus de spam? Clique ici !</label>
        </div>
        <div class="check">
            <input type="checkbox" name="pigeon" id="pigeon">
            <label for="pigeon">Je confirme ne pas avoir lu les conditions générales (comme d'habitude)</label>
        </div>
        <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
        <button type="submit">Créer un compte</button>
        
    </form>
</section>

    
