<?php

require_once("conexion.php");

if(isset($_SESSION['documento'])){
    $documentoProfesor = $_SESSION['documento'];
    $sql = "SELECT * FROM homework where id_teacher = '$documentoProfesor'";
    $consultarSql = mysqli_query($cone, $sql);

    while($row = mysqli_fetch_array($consultarSql)) {
        $json[] = array(
            'id' => $row['id_homework'],
            'nombre' => $row['Nombre_tareas'],
            'descripcion' => $row['descripcion'],
            'archivo' => $row['archivos']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
}

?>