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

    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $getId= htmlspecialchars($_GET['id']);
        $recherche= $mysqlClient->prepare("SELECT * from membres where id=?");
        $recherche->execute([$getId]);
        $reponse= $recherche->fetchAll();
        if($reponse)
        {
            $suppression= $mysqlClient->prepare("DELETE FROM membres where id=?");
            $suppression->execute([$getId]);
            ?>
                <script>
                    alert("Ce membre été supprimé");
                    window.location.replace('membres.php');
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert("Aucun membre n'a été trouvé");
                    window.location.replace('membres.php');
                </script>
            <?php
        }
    }
    else
    {
        ?>
            <script>
                alert("Aucun identifiant n'a été trouvé");
                window.location.replace('membres.php');
            </script>
        <?php
    }