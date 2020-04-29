<?php include "header.php" ?>
<?php 
    $errors = [
        "Pirate !",
        "Identifiants incorrects !",
    ];
?>
        <main>
            <div id="mainform">
                <form action="security.php" method="post">
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
                    <a href="register.php" id="cree">crée un compte</a><span class ="insulte">(file nous ta thune)</span>
                </form>
            </div>
        </main>
<?php include "footer.php" ?>
    <script src="script.js"></script>
</body>
</html>