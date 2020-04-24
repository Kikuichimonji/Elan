<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscris-toi mon ptit gars</title>
    <link rel="stylesheet" href="nappa.css">
</head>
<body>
    <div id="tortilas">
        <nav>
            <div id="topnav">
                <a href="">fr</a>
                <a href="">trouver</a>
                <a href="">aide</a>
                <a href="">compte</a>
                <a href="">favoris</a>
                <a href="">panier</a>
            </div>
            <div id="botnav">
                <div id="navlink">
                    <img src="logo.png" alt="logo" id="logo">
                    <a href=""><img src="nappa01.png" alt="Nappa"></a>
                    <a href=""><img src="jiren01.jpg" alt="Jiren"></a>
                </div>
                <input type="text" placeholder="search                  (image de loupe)">
            </div>
        </nav>
        <header>
            <div id="headbar">
                <a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. </a>
                <i>|</i>
                <a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                <i>|</i>
                <a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. </a>
            </div>
            <div id="pub">Pub de ses morts</div>
        </header>
        <main>
            <div id="mainform">
                <form action="" onSubmit="return validercreate()">
                    <h3>Créer un compte</h3>
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
                    <button type="submit">Créer un compte</button>
                </form>
            </div>
        </main>
        <footer>
            <div id="footbar">
                <div class="footlink">
                    <h4>Shop</h4>
                    <a href="">Sayajin</a>
                    <a href="">Namek</a>
                    <a href="">Majin</a>
                    <a href="">Human</a>
                </div>
                <div class="footlink">
                    <h4>Commandes</h4>
                    <a href="">Destruction de planètes</a>
                    <a href="">Annihilation d'une espèce</a>
                    <a href="">Suivis de commandes</a>
                    <a href="">Informations de paiement</a>
                    <a href="">Conditions générales</a>
                </div>
                <div class="footlink">
                    <h4>Aide</h4>
                    <a href="">FAQs</a>
                    <a href="">Nous contacter</a>
                    <a href="">Plotique de confidentialité</a>
                    <a href="">Plan des univers</a>
                </div>
                <div class="footlink">
                    <h4>A Propos De Nous</h4>
                    <a href="">L'histoire des Sayajin</a>
                    <a href="">Durabilité des Sayajin</a>
                    <a href="">Carrère des Sayajin</a>
                    <a href="">Boutique en ligne</a>
                </div>
            </div>
        </footer>
    </div>
    <script src="script.js"></script>
</body>
</html>