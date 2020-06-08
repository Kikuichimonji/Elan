<form action="?redir=connect&ctrl=security" method="post">
    <h3>S'identifier</h3>
    <h4><?php 
        if(!empty($_GET))
            if(isset($_GET["error"]))
                if($_GET["error"] !== false)
                    echo $errors[$_GET["error"]];
    ?></h4>
    <label for="email">*Email : <span id="failogin"></span></label>
    <input type="text" name="email" id="mailogin" required>
    <label for="password">*Password : </label>
    <input type="password" name ="password" id="passlogin" required>
    <a href="" id="oubli">Mot de passe oublié ? </a><span class ="insulte">(spece de naze)</span>
    <button type="submit">Connection</button>
    <div class="check">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
    </div>
    <a href="?redir=registerform" id="cree">crée un compte</a><span class ="insulte">(file nous ta thune)</span>
    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
</form>