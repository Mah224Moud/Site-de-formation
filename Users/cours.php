<?php
//include_once('database.php');

if($_FILES)
{
    $picture= $_FILES['fichier']['name'];
    $picExtension= new SplFileInfo($picture);
    $getPicExtension= $picExtension->getExtension();

    $possibleExtension= ['jpeg', 'jpg', 'png'];

    if(!in_array($getPicExtension, $possibleExtension))
        echo "y'a un soucis";
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

    <!--<form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fichier" id="">
        <input type="submit" value="send">
    </form>-->
    
</body>
</html>