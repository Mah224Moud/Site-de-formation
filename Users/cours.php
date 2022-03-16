<?php
include_once('database.php');

$insertion = 'INSERT INTO `essai2`(`id`, `nom`, `prenom`, `date`) VALUES (NULL, "MOUD", "DIALLO", "1997-10-10")';
$creation = $mysqlClient->prepare($insertion);

if($creation->execute())
{
    echo "save";
}
else
    echo "not";

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

    <a href="test.php">test</a>
    
</body>
</html>