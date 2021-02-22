<?php

require_once("conexion.php");

if(isset($_POST['id'])){
    $idTarea = $_POST['id'];

    $sql = "DELETE FROM homework WHERE id_homework = '$idTarea'";
    $consultarSql = mysqli_query($cone, $sql);
        
    echo'Se ha borrado la tarea correctamente';
}

?>