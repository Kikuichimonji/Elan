<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $txt = "Notre formation DL commence aujourd'hui";
        echo $txt."<br>";
        $txt= str_replace("aujourd'hui","demain",$txt);
        echo $txt;
    ?>
</body>
</html>