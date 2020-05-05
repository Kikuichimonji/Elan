<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscris-toi mon ptit gars</title>
    <link rel="stylesheet" href="nappa.css">
</head>
<body>
<?php 
    session_start(); 
    if(!isset($_SESSION["token"]))
    {
        $token = bin2hex(random_bytes(32));
        $_SESSION["token"] = $token;
    }
    else
        $token = $_SESSION["token"];
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