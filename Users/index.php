<?php

include_once('database.php');


//Creation de toutes les sessions
include_once('session.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css?ts=<?=time()?>">
    <title>Accueil</title>
</head>
<body>

    <?php include_once("header.php");?>
    
    <div class="titre">
        <h1>Bienvenue sur la page d'accueil</h1>
    </div>
    <div id="accueil">
        <a href="cours.php">
            <img src="../Images/cours.jpg" alt="" class="cours">
            <div>Cours</div>
        </a>
        <a href="forum.php">
            <img src="../Images/chat.png" alt="" class="forum">
            <div>Forum</div>
        </a>
        <a href="connexion.php">
            <img src="../Images/login.jpg" alt="" class="login">
            <div>Connexion</div>
        </a>
    </div>

    
    
</body>
</html>
