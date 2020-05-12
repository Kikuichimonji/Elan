<?php include "src/header.php" ?>
<?php 
    $errors = [
        "Pirate !",
        "Identifiants incorrects !",
        "Utilisateur inconnu",
    ];

    /*if(!isset($_SESSION["csrf"]))
        $_SESSION["csrf"] = random_bytes(20);
    $csrf = password_hash($_SESSION["csrf"],PASSWORD_ARGON2I).random_bytes(20);*/

    if(isset($_COOKIE["CookieMonster"]) || isset($_SESSION["user"]))
        header("Location: view/welcome.php");
    
?>
        <main>
            <div id="mainform">
                <form action="controller/security.php" method="post">
                    <h3>S'identifier</h3>
                    <h4><?php 
                        if(!empty($_GET) && $_GET["error"] !== false)
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
                    <a href="view/register.php" id="cree">crée un compte</a><span class ="insulte">(file nous ta thune)</span>
                    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
                </form>
            </div>
        </main>
        <script src="script.js"></script>
<?php include "src/footer.php" ?>
    
