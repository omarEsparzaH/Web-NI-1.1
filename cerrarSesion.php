<?php
    session_start();


    unset($_SESSION["usuario"]);
 
    session_destroy();

    mysql_close();
 
    header('Location:../index.php' );
?>