<?php 
    //Creation de toutes les sessions
    include_once('../Users/session.php');


    //appel database
    include_once("../Users/database.php");

    if(isset($_GET['session']) && !empty($_GET['session']))
    {
        session_destroy();
        header('location: ../Users/index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Users/design.css?ts=<?=time()?>">
    <title>Profil</title>
</head>
<body>
    <div >
        <a class="profil-lien" href="../Users/index.php"><Span>Accueil><?= $_SESSION['username'] ?></Span></a>
    </div>

    <h1 class="profil-titre">Profil</h1>

    <div id="profil-button">
        <div id="profil-modifier">
            <a href="modifier.php">Modifier</a>
        </div>
        <div id="profil-deconnexion">
            <a href="?session=<?= $_SESSION['username'] ?>">Deconnexion</a>
        </div>
    </div>

    <div class="cadre">
        <img class="image-profil" src="<?=$_SESSION['photo']?>" alt="">
       <h2><?= $_SESSION['username'] ?></h2>
            <p>
                <?=$_SESSION['mini_bio']?>
            </p>
    </div>

    <div class="cadre autres">
        <h2>A propos de moi</h2>
        <h3><?=$_SESSION['prenom']." ". strtoupper($_SESSION['nom']) ?></h3>
        <p>Date de naissance: <?= $_SESSION['date_naissance']?></p>
        <p>Adresse mail: <?= $_SESSION['mail']?></p>
    </div>

    <div class="cadre autres">
        <h2>Biographie</h2>
        <p>
            <?=$_SESSION['bio']?>
        </p>
        <h2>Signature</h2>
        <p>
            <?=$_SESSION['signature']?>
        </p>
    </div>

    <div class="cadre autres">
        <h2>Informature sur le compte</h2>
        <p>Date d'inscription: <?= $_SESSION['date_inscription']; ?></p>
    </div>
</body>
</html>