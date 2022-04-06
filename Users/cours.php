<?php
//include_once('database.php');

    if(isset($_POST['essai']) && !empty($_POST['essai']))
    {
        echo "test";
        $to      = 'doumouma113@gmail.com';
        $subject = 'Confirmation Creation Compte';
        $message = 'Bonjour Moud bienvenue parmi nous!';
        $headers = 'From: no-reply@example.com';
        $retour= mail("doumouma113@gmail.com", "Hello", "Essai envoie", "");
        if($retour)
            echo "send";
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours</title>
</head>
<body>
    <h1>Bienvenue sur cours</h1>

    <form action="" method="post">
        <input type="text" name="essai" id="">
        <input type="submit" value="send">
    </form>
    
</body>
</html>