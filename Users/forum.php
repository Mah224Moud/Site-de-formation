<?php
    session_start();
    include_once('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forum.css?ts=<?=time()?>">
    <link rel="stylesheet" href="design.css?ts=<?=time()?>">

    <title>Forum</title>
</head>
<body>
    <nav>
        <div id="menu">
            <ul>
                <li>
                    <a href="index.php">Accueil</a>
                </li>
                <li>
                <a href="cours.php">Cours</a>
                </li>
                <li>
                    <a href="forum.php">Forum</a>
                </li>
                <?php if (!isset($_SESSION['username'])): ?>
                    <li>
                        <a href="connexion.php">Connexion</a>
                    </li>
                <?php else: ?>
                    <div class="profil">
                        <li id="cercle">
                            <a href="../Profil/index.php"><img class="image_menu" src="<?=$_SESSION['photo']?>" alt=""></a>
                            <div id="enligne"></div>
                        </li>
                    </div>
                <?php endif ?>
            </ul>
        </div>
    </nav>
    <div class="global">
        <h1>Forum</h1>
        <div class="cadre-message" id="cadre-msg">
            <?php
                $sqlQuery = "SELECT username_, heure_envoie, message, photo FROM membres, messagerie WHERE messagerie.idUser=membres.id ";
                $recherche = $mysqlClient->prepare($sqlQuery);
                $recherche->execute();
                $reponse = $recherche->fetchAll();
            ?> 
            <?php foreach ($reponse as $reponses): ?>

                <?php
                    $heureEnvoie= $reponses['heure_envoie'];
                    $nouveauFormat= strtotime($heureEnvoie);
                    $nouvelleDate= date("d-M-Y à H:i", $nouveauFormat);
                ?>
                <div class="message">
                    <img src="<?=$reponses['photo']?>" alt="">
                    <div>
                       <div>
                            <strong><em><?= $reponses['username_'] ?></em></strong> <em> <?= $nouvelleDate ?></em> </em>
                        </div>
                       <p id="posted_msg">
                            <?= $reponses['message'] ?>
                        </p>
                    </div>
               </div> 
            <?php endforeach ?>
        </div>
        <?php if(isset($_SESSION["username"])): ?>
            <div id="form-forum">
                <form action="traitement_msg.php" method="POST">
                    <textarea name="msg" id="" cols="30" rows="1" placeholder="Ecrire votre message ici..." required></textarea><input type="submit" value="Envoyer" name="msg_send">
                </form>
            </div>
        <?php endif ?>
    </div>
        
        
        <script>document.getElementById("cadre-msg").scrollTop = document.getElementById("cadre-msg").scrollHeight;</script>
</body>
</html>