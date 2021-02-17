<?php
    $cone= mysqli_connect("localhost","root","","redes");
    if($cone->connect_error)
    {
        die("fallo la conexion" . mysqli_connect_errno());
    }
    session_start();
?>