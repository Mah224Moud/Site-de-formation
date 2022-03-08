<?php 
    ///Creation de toutes les sessions
    include_once('../Users/session.php');


    //appel database
    include_once("../Users/database.php");

    if(isset($_POST['save']))
    {
        if(isset($_POST['modif_mini_bio']) && !empty($_POST['modif_mini_bio']))
        {
            $mini= nl2br($_POST[modif_mini_bio]);
            $modif= $mysqlClient->prepare("UPDATE membres SET mini_bio='$mini'  where id=? ");
            $modif->execute([$_SESSION['id']]);
        }
        if(isset($_POST['modif_bio']) && !empty($_POST['modif_bio']))
        {
            $bio= nl2br($_POST[modif_bio]);
            $modif= $mysqlClient->prepare("UPDATE membres SET bio='$bio' where id=? ");
            $modif->execute([$_SESSION['id']]);
        }
        if(isset($_POST['modif_signature']) && !empty($_POST['modif_signature']))
        {
            $signes= nl2br($_POST[modif_signature]);
            $modif= $mysqlClient->prepare("UPDATE membres SET signature= '$signes'   where id=? ");
            $modif->execute([$_SESSION['id']]);
        }

        if(isset($_POST['modif_nom']))
        {
            $modif= $mysqlClient->prepare("UPDATE membres SET nom= '$_POST[modif_nom]'   where id=? ");
            $modif->execute([$_SESSION['id']]);
        }


        if(isset($_POST['modif_prenom']))
        {
            $modif= $mysqlClient->prepare("UPDATE membres SET prenom= '$_POST[modif_prenom]'   where id=? ");
            $modif->execute([$_SESSION['id']]);
        }

        header("Location:index.php");
    }

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Users/design.css?ts=<?=time()?>">
    <link rel="stylesheet" href="modifier.css?ts=<?=time()?>">
    <title>Profil</title>
</head>
<body>
    <div >
        <a class="profil-lien" href="../Users/index.php"><Span>Accueil</Span></a>>
        <a class="profil-lien" href="index.php"><Span><?= $_SESSION['username'] ?></Span></a>>
        <Span>Modifier</Span>
    </div>

    <h1 class="profil-titre">Modifier</h1>

    <form action="" method="POST">
        <div id="enregistrer-button">
            <div id="modifier">
                <input type="submit" value="Enregistrer" name="save">
            </div>
        </div>

        <div class="cadre">
            <img class="image-profil" src="<?=$_SESSION['photo']?>" alt="">
        <h2><?= $_SESSION['username'] ?></h2>
        </div>


        <div class="cadre autres">
            <h2>Mini Bio</h2>
            <textarea name="modif_mini_bio" id="" cols="30" rows="3" placeholder="<?=$_SESSION['mini_bio']?>"></textarea>
        </div>
        <div class="cadre autres">
            <h2>Nom</h2>
            <input type="text" name="modif_nom" id="" value="<?=$_SESSION['nom']?>">
        </div>
        <div class="cadre autres">
            <h2>Prénom</h2>
            <input type="text" name="modif_prenom" id="" value="<?=$_SESSION['prenom']?>">
        </div>

        <div class="cadre autres">
            <h2>Biographie</h2>
            <textarea name="modif_bio" id="" cols="30" rows="3" placeholder="<?=$_SESSION['bio']?>"></textarea>
        </div>
        <div class="cadre autres">
            <h2>Signature</h2>
            <textarea name="modif_signature" id="" cols="30" rows="3" placeholder="<?=$_SESSION['signature']?>"></textarea>
        </div>

    </form>
    
</body>
</html>