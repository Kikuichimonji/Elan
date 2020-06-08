
<section>
    <form action="?redir=register&ctrl=security" method="post" >
        <h3>Créer un compte</h3>
        <h4>
            <?php 
                if(!empty($_GET))
                    if(isset($_GET["error"]))
                        if($_GET["error"] !== false)
                            echo $errors[$_GET["error"]];
            ?>
        </h4>
        <label for="username">*Pseudo :</label>
        <input type="text" name="username" required>
        <label for="email">*Email :</label>
        <input type="text" name="email" required>
        <label for="password">*Password :</label>
        <input type="password" name ="password" id="password1" required>
        <label for="password2">*Confirmer le password : <span id="failpass"></span></label>
        <input type="password" name ="password2" id="password2" required>
        <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
        <button type="submit">Créer un compte</button>
        
    </form>
</section>

    
