<?php
    include_once("database.php");


    if(isset($_POST['envoyer']))
    {
        $erreurs = [];
        $erreursCreation= [];
        
        if(empty($_POST['nom']))
        {
            $erreurs['nom']= "Le nom est obligatoire";
        }
        if(empty($_POST['prenom']))
        {
            $erreurs['prenom']= "Le prenom est obligatoire";
        }
        if(empty($_POST['naissance']))
        {
            $erreurs['naissance']= "Le date de naissance est obligatoire";
        }
        if(empty($_POST['mdp']))
        {
            $erreurs['mdp']= "Le mot de passe est obligatoire";
        }
        if(empty($_POST['confirmation']))
        {
            $erreurs['confirmation']= "Merci de renseigner votre mot de passe";
        }
        if(empty($_POST['email']))
        {
            $erreurs['email']= "L'email est obligatoire";
        }
        else
        {
            //verfication email valid
            $valid_email= "[a-z][a-z0-9]+@[a-z]+\.[a-z]+";
            if(!preg_match("#$valid_email#", $_POST['email']))
            {
                $erreursCreation['email']= "Adresse mail invalide !!! Le format souhaité est: 'monmail@exemple.test'";
            }
        }
        

        if(empty($_POST['civilite']))
        {
            $erreurs['civilite']= "Merci de renseigner la civilié";
        }
        if(empty($_POST['pseudo']))
        {
            $erreurs['pseudo']= "Le pseudo est obligatoire";
        }
        if ($_FILES['p_profil']['name']!="" && $_FILES['p_profil']['size']==0)
        {
                $erreurs['p_profil']= "Merci de choisir une photo dont la taille est inférieur ou égale à 2Mb";
        }
        
        


        if($_POST['confirmation'] != $_POST['mdp'])
        {
            $erreursCreation['confirmation']= "Les deux mot de passe ne correspondent pas !!!";
        }

        if(empty($erreurs) && empty($erreursCreation))
        {
            $email= $_POST['email'];
            $sqlQuery = "SELECT * FROM `membres` WHERE mail='$email'";
            $recherche = $mysqlClient->query($sqlQuery);
            $recherche->execute();
            $reponse = $recherche->fetchAll();

            //si le mail saisie n'existe pas ? continuer creation du compte
            if(!$reponse)
            {
                //si le pseudo n'exite pas ? creer le compte
                $pseudo= $_POST['pseudo'];
                $recherchePseudo= $mysqlClient->query("SELECT * FROM `membres` WHERE username='$pseudo'");
                $recherchePseudo->execute();
                $pseudoTrouve = $recherchePseudo->fetchAll();
                if(!$pseudoTrouve)
                {
                    $motDePasse= password_hash($_POST['mdp'],  PASSWORD_DEFAULT);
                    
                    $insertion = 'INSERT INTO `membres`(`id`, `nom`, `prenom`, `date`, `username`, `mail`, `mot_de_passe`, `civilite`, `photo`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)';
                    $creation = $mysqlClient->prepare($insertion);

                    //si pas de photo choisi mais que genre soit homme alors profil par defaut homme
                    if ($_FILES['p_profil']['name']=="" && (isset($_POST['civilite']) && $_POST['civilite']=="Mr"))
                    {
                        $photo="../Images/homme.jpg";
                        //si tout bon creer le compte
                        if($creation->execute([$_POST['nom'], $_POST['prenom'], $_POST['naissance'], $_POST['pseudo'], $_POST['email'], $motDePasse, $_POST['civilite'], $photo]))
                        {
                            ?>
                                <script>
                                    alert("Votre compte a été crée :)\nAppuyez sur 'OK' pour être rediriger sur la page de connexion ;)\n");
                                    window.location.replace("connexion.php"); 
                                </script>
                            <?php
                        }//autrement afficher un msg d'erreur
                        else
                        {
                            ?>
                                <script>alert("Il y'a eu une erreur ce compte n'a pas été crée !!!\n");</script>
                            <?php
                        }
                    }
                    // si tjrs pas de photo mais genre femme, alors photo femme
                    elseif ($_FILES['p_profil']['name']=="" && (isset($_POST['civilite']) && $_POST['civilite']!="Mr"))  
                    {
                        $photo="../Images/femme.jpeg";
                        //si tout bon creer le compte
                        if($creation->execute([$_POST['nom'], $_POST['prenom'], $_POST['naissance'], $_POST['pseudo'], $_POST['email'], $motDePasse, $_POST['civilite'], $photo]))
                        {
                            ?>
                                <script>
                                    alert("Votre compte a été crée :)\nAppuyez sur 'OK' pour être rediriger sur la page de connexion ;)\n");
                                    window.location.replace("connexion.php"); 
                                </script>
                            <?php
                        }//autrement afficher un msg d'erreur
                        else
                        {
                            ?>
                                <script>alert("Il y'a eu une erreur ce compte n'a pas été crée !!!");</script>
                            <?php
                        }
                    }//s'il choisi une photo alors prendre celle ci
                    else
                    {
                        //si tout bon creer le compte

                        $photo= "../Images/".$_FILES['p_profil']['name'];
                        $from= $_FILES['p_profil']['tmp_name'];
                        $destion= "../Images/".$_FILES['p_profil']['name'];
                        move_uploaded_file($from, $destion);


                        
                        if($creation->execute([$_POST['nom'], $_POST['prenom'], $_POST['naissance'], $_POST['pseudo'], $_POST['email'], $motDePasse, $_POST['civilite'], $photo]))
                        {
                            ?>
                                <script>
                                    alert("Votre compte a été crée :)\nAppuyez sur 'OK' pour être rediriger sur la page de connexion ;)\n");
                                    window.location.replace("connexion.php"); 
                                </script>
                            <?php
                        }//autrement afficher un msg d'erreur
                        else
                        {
                            ?>
                                <script>alert("Il y'a eu une erreur ce compte n'a pas été crée !!!\n");</script>
                            <?php
                        }
                    }
                }
                else
                {
                    $erreursCreation['pseudo_existant']= "Attention ce pseudo existe déja!!!\nMerci de choisir une autre :( ";
                }
                
            }//sinon afficher un message d'erreur
            else
            {
                $erreursCreation['compte_existant']= "Attention vous pouvez pas creer un compte avec une adresse mail existante !!!\nMerci de choisir une autre :( ";
            }
        }
    }

    
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css?ts=<?=time()?>">
    <title>Inscription</title>
</head>
<body>
    <?php include_once("header.php");?>
    <div class="titre">
        <h1>Bienvenue sur la page d'inscription</h1>
    </div>

    
    <form method="POST" id="form-inscription" enctype="multipart/form-data">
    
        <fieldset>
            <legend>Inscription</legend>

            <!-- Compte existant -->
            <?php if (isset($erreursCreation['compte_existant'])): ?>
                   <div class="erreurs">
                        <p>
                            <?= $erreursCreation['compte_existant'] ?>
                        </p> 
                   </div>
            <?php endif ?>
            <?php if (isset($erreursCreation['pseudo_existant'])): ?>
                   <div class="erreurs">
                        <p>
                            <?= $erreursCreation['pseudo_existant'] ?>
                        </p> 
                   </div>
            <?php endif ?>

            <!-- Civilié -->
            <label for="">Civilité: </label>
            <label for="sexe"> Mr</label><input type="radio" name="civilite" value="Mr">
            <label for="sexe"> Mme</label><input type="radio" name="civilite" value="Mme/Mlle" ><br>
            <?php if (isset($erreurs['civilite'])): ?>
                    <div class="erreurs">
                        <p>
                            <?= $erreurs['civilite'] ?>
                        </p> 
                    </div>
                <?php endif ?>
                

            <!-- Nom -->
            <label for="">Nom: </label><input type="text" name="nom" value="<?= $_POST['nom'] ?? '' ?>"><br>
            <?php if (isset($erreurs['nom'])): ?>
               <div class="erreurs">
                    <p>
                        <?= $erreurs['nom'] ?>        
                    </p> 
               </div>
            <?php endif ?>
            

            <!-- Prenom -->
            <label for="">Prenom: </label><input type="text" name="prenom" value="<?= $_POST['prenom'] ?? '' ?>"><br>
            <?php if (isset($erreurs['prenom'])): ?>
                   <div class="erreurs">
                        <p>
                            <?= $erreurs['prenom'] ?>
                        </p> 
                   </div>
            <?php endif ?>
            

            <!-- Date de naissance -->
            <label for="">Date de naissance: </label><input type="date" name="naissance" value="<?= $_POST['naissance'] ?? '' ?>"><br>
            <?php if (isset($erreurs['naissance'])): ?>
                   <div class="erreurs">
                        <p>
                            <?= $erreurs['naissance'] ?>
                        </p> 
                   </div>
            <?php endif ?>
            

            <!-- Email -->
            <label for="">Email: </label><input type="email" name="email" placeholder="monmail@test.exemple" value="<?= $_POST['email'] ?? '' ?>"><br>
            <?php if (isset($erreurs['email'])): ?>
                   <div class="erreurs">
                        <p>
                            <?= $erreurs['email'] ?>
                        </p> 
                   </div>
            <?php endif ?>
            <?php if (isset($erreursCreation['email'])): ?>
                   <div class="erreurs">
                        <p>
                            <?= $erreursCreation['email'] ?>
                        </p> 
                   </div>
            <?php endif ?>
            


            <!-- Pseudo -->
            <label for="">Pseudo: </label><input type="text" name="pseudo" value="<?= $_POST['pseudo'] ?? '' ?>"><br>
            <?php if (isset($erreurs['pseudo'])): ?>
                   <div class="erreurs">
                        <p>
                            <?= $erreurs['pseudo'] ?>
                        </p> 
                   </div>
            <?php endif ?>
           
            <!-- Photo -->
            <label for="">Photo de profil: </label><input type="file" name="p_profil" value="<?= $_POST['p_profil'] ?? '' ?>"><br>
            <?php if (isset($erreurs['p_profil'])): ?>
                   <div class="erreurs">
                        <p>
                            <?= $erreurs['p_profil'] ?>
                        </p> 
                   </div>
            <?php endif ?>


            <!-- Mot de passe -->
            <label for="">Mot de passe: </label><input type="password" name="mdp"><br>
            <?php if (isset($erreurs['mdp'])): ?>
                   <div class="erreurs">
                        <p>
                            <?= $erreurs['mdp'] ?>
                        </p> 
                   </div>
            <?php endif ?>

            <!-- Confirmation mot de passe -->
            <label for="">Confirmer mot de passe: </label><input type="password" name="confirmation"><br>
            <?php if (isset($erreurs['confirmation'])): ?>
                   <div class="erreurs">
                        <p>
                            <?= $erreurs['confirmation'] ?>
                        </p>
                   </div>
            <?php endif ?>
            

            <!-- mot de passe non correspondant -->
            <?php if (isset($erreursCreation['confirmation'])): ?>
                   <div class="erreurs">
                        <p>
                            <?= $erreursCreation['confirmation'] ?>
                        </p>
                   </div>
            <?php endif ?>
            <input type="reset" value="Annuler"><input type="submit" value="S'inscrire" name="envoyer">
        </fieldset>
        <p>Vous avez deja un compte ? <a href="connexion.php">Connectez-vous</a></p>
    </form>
</body>
</html>