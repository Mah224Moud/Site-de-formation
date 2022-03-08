<?php 
session_start();
include_once('database.php');


if(isset($_POST['msg_send']) && (isset($_POST['msg']) && !empty($_POST['msg'])))
{
   $msg= nl2br($_POST['msg']);
   if(preg_match("#^[-_. \t\s\r]#", $msg))
   {
       ?> 
            <script>
                alert("Attention !!!\nVous ne pouvez pas commencer votre phrase par <?=$msg?>");
                window.location.replace("forum.php");
            </script>
       <?php
   }
   else
   {
        $insertion = 'INSERT INTO `messagerie` (`id`, `username_`, `idUser`, `message`) VALUES (NULL, ?, ?, ?)';
        $creation = $mysqlClient->prepare($insertion);
        $creation->execute([$_SESSION['username'], $_SESSION['id'], $msg]);

        header('location: forum.php');
   }
}
else
    header('location: forum.php');