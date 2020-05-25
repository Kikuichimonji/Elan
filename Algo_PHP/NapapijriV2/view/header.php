<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscris-toi mon ptit gars</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH."nappa.css" ?>">
</head>
<body>
<?php 

    $errors = [
        "Pirate !",
        "Identifiants incorrects !",
        "Utilisateur inconnu",
        "T'as foutu quoi bordel?",
        "CSRF FFS",
        "Mots de passes invalide",
        "Les mots de passes ne correspondent pas",
        "Cette adresse email est déjà utilisée",
        "Adresse mail invalide"
    ];
?>
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
                    <img src=<?php echo IMG_PATH."logo.png" ?> alt="logo" id="logo">
                    <a href=""><img src=<?php echo IMG_PATH."nappa01.png"?> alt="Nappa"></a>
                    <a href=""><img src=<?php echo IMG_PATH."jiren01.jpg"?> alt="Jiren"></a>
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
