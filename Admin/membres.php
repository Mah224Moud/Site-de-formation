<?php
    try
    {
        // On se connecte à MySQL
        $mysqlClient = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Users/design.css">
    <title>Membres</title>
</head>
<body>
    <?php include_once("header.php");?>
    <h1>Binvenue dans membres</h1>
    <?php 
    
        $requete= $mysqlClient->query("SELECT * from membres");
        while($reponse= $requete->fetch())
        { ?>
            <div>
                <span>
                    <?= $reponse['id'].": ". strtoupper($reponse['nom'])." ".$reponse['prenom']; ?>
                </span>
                <a href="suppression-membre.php?id=<?= $reponse['id'] ?>">
                    <button style="color:white; background-color:red;">Supprimer</button>
                </a>
            </div>
            <?php
        }
    
    ?>
</body>
</html>