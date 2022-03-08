<?php
//appel database
include_once("database.php");


//Creation de toutes les sessions
include_once('session.php');

    if(isset($_POST['envoyer']))
    {
        $erreurConnexion= [];
        if(empty($_POST['adresse_mail']))
        {
            $erreurConnexion['adresse_mail']= "L'adresse est obligatoire";
        }
        if(empty($_POST['mot_d_passe']))
        {
            $erreurConnexion['mot_d_passe']= "Le mot de passe est obligatoire";
        }

        if(empty($erreurConnexion))
        {
            $erreurSurLesDonnees= [];


            $email= $_POST['adresse_mail'];
            $sqlQuery = "SELECT * FROM `membres` WHERE mail='$email'";
            $recherche = $mysqlClient->prepare($sqlQuery);
            $recherche->execute();
            $reponse = $recherche->fetchAll();
            if($reponse)
            {   foreach ($reponse as $reponses)
                if($email == $reponses['mail'] && password_verify($_POST['mot_d_passe'], $reponses['mot_de_passe']))
                {
                    //si l'admin est connecté
                    if($reponses['username']=="Admin")
                    {
                        $_SESSION['admin']= $reponses['username'];
                        header('location: ../Admin/index.php');
                    }
                    //sinon membre
                    else
                    {
                        $_SESSION['username']= $reponses['username'];
                        header('location: index.php');
                    }
                    
                }
                else
                    $erreurSurLesDonnees['mdp']= "Le mot de passe saisie est incorrect";
            }
            else
                $erreurSurLesDonnees['mail_inexistant']= "Adresse mail inexistante !!!";
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css?ts=<?=time()?>">
    <title>Connexion</title>
</head>


<body>
    <?php include_once("header.php");?>
    <div class="titre">
        <h1>Bienvenue sur la page de connexion</h1>
    </div>
    
    
    <div>
        <form id="form-connexion" method="POST">
            <!-- Addresse mail inexistante -->
            <?php if(isset($erreurSurLesDonnees['mail_inexistant'])): ?>
                <div class="erreurs">
                    <p>
                        <?= $erreurSurLesDonnees['mail_inexistant']; ?>
                    </p>
                </div>
            <?php endif ?>

            <fieldset>
                <legend>Connexion</legend>

                <!-- Email -->
                <label for="">Email: </label><input type="email" id="adresse_mail" name="adresse_mail" value="<?= $_POST['adresse_mail'] ?? '' ?>" placeholder="monmail@test.exemple"><br>
                <?php if(isset($erreurConnexion['adresse_mail'])): ?>
                    <div class="erreurs">
                        <p>
                            <?= $erreurConnexion['adresse_mail']; ?>
                        </p>
                </div>
                <?php endif ?>

                <!-- Mot de passe -->
                <label for="">Mot de passe: </label><input type="password" id="mot_d_passe" name="mot_d_passe"><br>
                <?php if(isset($erreurConnexion['mot_d_passe'])): ?>
                    <div class="erreurs">
                        <p>
                            <?= $erreurConnexion['mot_d_passe']; ?>
                        </p>
                    </div>
                <?php endif ?>

                <!-- Mot de passe incorrect -->
                <?php if(isset($erreurSurLesDonnees['mdp'])): ?>
                    <div class="erreurs">
                        <p>
                            <?= $erreurSurLesDonnees['mdp']; ?>
                        </p>
                    </div>
                <?php endif ?>

                <input type="reset" value="Annuler"> <input type="submit" value="Connexion" name="envoyer">
            </fieldset>
            <p>Vous n'avez pas de compte ? <a href="inscription.php">Creez-en</a></p>
        </form>
    </div>
</body>
</html>