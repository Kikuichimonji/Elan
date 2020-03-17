<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $txt = "Notre formation DL commence aujourd'hui";
        echo $txt."<br/> Cette phrase contient ".str_word_count ($txt,0,"'")." mots";        
    ?>
</body>
</html>