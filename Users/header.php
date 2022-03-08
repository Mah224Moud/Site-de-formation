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

<?php if (isset($_SESSION['username'])): ?>
        <p class="phraseAccueil" style="font-family: 'Brush Script MT', 'cursive'; font-size: 30px">Bonjour <?= $_SESSION['username']; ?> </p>
    <?php else: ?>
        <p class="phraseAccueil" style="font-family: 'Brush Script MT', 'cursive'; font-size: 30px">Vous n'êtes pas connecté</p>  
    <?php endif ?>