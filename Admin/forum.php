<?php
    session_start();
    include_once('../Users/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Users/forum.css?ts=<?=time()?>">
    <link rel="stylesheet" href="../Users/design.css?ts=<?=time()?>">
    <link rel="stylesheet" href="admin.css?ts=<?=time()?>">

    <title>Forum</title>
</head>
<body>
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
                        <button style="background-color:red">Supprimer</button>
                       
                    </div>
               </div> 
            <?php endforeach ?>
        </div>
        
        
        <script>document.getElementById("cadre-msg").scrollTop = document.getElementById("cadre-msg").scrollHeight;</script>
</body>
</html>