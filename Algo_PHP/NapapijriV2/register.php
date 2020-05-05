<?php include "header.php" ?>
<?php 
    $errors = [
        "Pirate !",
        "Identifiants incorrects !",
        "Champs manquants !",
        "Mots de passes invalide",
        "Les mots de passes ne correspondent pas",
        "Cette adresse email est déjà utilisée",
        "Adresse mail invalide"
    ];
?>
        <main>
            <div id="mainform">
                <form action="register_check.php" method="post" onSubmit="return validercreate()">
                    <h3>Créer un compte</h3>
                    <h4>
                        <?php 
                            if(!empty($_GET) && $_GET["error"] !== false)
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
            </div>
        </main>
        <script src="script.js"></script>
    <?php include "footer.php" ?>
    
