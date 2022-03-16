<?php 
session_start();
include_once("../Users/database.php");

//creation des sessions admin
if(isset($_SESSION["admin"]))
    {
        $search= $mysqlClient->prepare("SELECT * from membres where username=?");
        $search->execute([$_SESSION['admin']]);
        if($search->rowCount() > 0)
        {
            foreach($search as $trouve)
            {
                $_SESSION['admin_nom']= $trouve['nom'];
                $_SESSION['admin_prenom']= $trouve['prenom'];
                $_SESSION['admin_mail']= $trouve['mail'];
                $_SESSION['admin_photo']= $trouve['photo'];
                //formater la date de naissance en 01-Jan-2021
                $dateRecup= $trouve['date'];
                $nouveauFormat= strtotime($dateRecup);
                $nouvelleDate= date("d-M-Y", $nouveauFormat);
                $_SESSION['admin_date_naissance']= $nouvelleDate;

                $inscriptionRecup= $trouve['date_inscription'];
                $formatNouveau= strtotime($inscriptionRecup);
                $dateNouvelle= date("d-M-Y", $formatNouveau);
                $_SESSION['admin_date_inscription']= $dateNouvelle;
            }
        }
    }



if (isset($_SESSION['admin'])): ?>

    <nav>
        <ul>
            <li>
                <a href="index.php">Accueil</a>
            </li>
            <li>
            <a href="">Cours</a>
            </li>
            <li>
                <a href="forum.php">Forum</a>
            </li>
            <li>
                <a href="?deco=<?=$_SESSION['admin'] ?>">Deconnexion</a>
            </li>
            <div class="profil">
                <li id="cercle">
                    <!-- pour l'instant pas de redirection sur un profil d'admin -->
                    <a href="" class="admin-profil-link"><img class="image_menu" src="<?=$_SESSION['admin_photo']?>" alt=""></a>
                    <div id="enligne"></div>
                </li>
             </div>
        </ul>
    </nav>

    <?php if(isset($_GET['deco'])): ?>
        <?php session_destroy(); ?>
        <script>
            alert("Vous n'êtes plus connecté en tant qu'Admin :)\nAppuyez sur 'OK' pour être rediriger sur la page d'accueil ;)");
            window.location.replace("../Users/index.php"); 
        </script>    
    <?php endif ; ?>
<?php else: ?>
    <script>
        alert("Vous n'êtes plus connecté en tant qu'Admin :)\nAppuyez sur 'OK' pour être rediriger sur la page d'accueil ;)");
        window.location.replace("../Users/index.php"); 
    </script>
<?php endif ?>