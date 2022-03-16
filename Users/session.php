<?php session_start(); 

include_once('database.php');

//Creation de toutes les sessions
    if(isset($_SESSION["username"]))
    {
            $search= $mysqlClient->prepare("SELECT * from membres, profil where membres.id=profil.idUser and username=?");
            $search->execute([$_SESSION['username']]);
            if($search->rowCount() > 0)
            {
                foreach($search as $trouve)
                {
                    $_SESSION['nom']= $trouve['nom'];
                    $_SESSION['prenom']= $trouve['prenom'];
                    $_SESSION['mail']= $trouve['mail'];
                    $_SESSION['photo']= $trouve['photo'];
                    $_SESSION['id']= $trouve['id'];
                    //formater la date de naissance en 01-Jan-2021
                    $dateRecup= $trouve['date'];
                    $nouveauFormat= strtotime($dateRecup);
                    $nouvelleDate= date("d-M-Y", $nouveauFormat);
                    $_SESSION['date_naissance']= $nouvelleDate;

                    $inscriptionRecup= $trouve['date_inscription'];
                    $formatNouveau= strtotime($inscriptionRecup);
                    $dateNouvelle= date("d-M-Y", $formatNouveau);
                    $_SESSION['date_inscription']= $dateNouvelle;


                    $_SESSION['mini_bio']= $trouve['mini_bio'];
                    $_SESSION['bio']= $trouve['bio'];
                    $_SESSION['signature']= $trouve['signature'];
                }
            }




    }
?>