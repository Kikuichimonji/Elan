<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pendu.css" />
    <title>Document</title>
</head>
<body> 
    <?php 
        $liste=["developpeur","developper","developpement","encyclopedie","chameau","test","bonjour","virgile","llanfairpwllgwyngyllgogerychwyrndrobwllllantysiliogogogoch"];
        $mot = $liste[array_rand($liste,1)];
    ?>
    <div id="enchiladas">
            <h1>Le jeu du PENDU</h1>
        <div id="mainjeu">
            <div id="dessin">
                dessin
            </div>
            <div id="mot"> 
                <?php 
                    for($i=0;$i<strlen($mot);$i++)
                        echo "<span class='lettre' id='".$i."'>_</span>";
                ?>
            </div>
            <div id="texte">
                
            </div>
            <div id="reponse"><?php echo $mot ?></div>
        </div>
    </div>
    
    <script src="pendu.js"></script>
</body>
</html>
    
