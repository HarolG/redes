<?php

require_once("conexion.php");

if(isset($_SESSION['documento'])) {
    $documentoProfesor = $_SESSION['documento'];
    $idTarea = $_POST['id'];

    $sql = "SELECT * FROM uptask, user WHERE uptask.documento = user.documento AND uptask.id_homework = '$idTarea'";
    $consultarSql = mysqli_query($cone, $sql);

    while($row = mysqli_fetch_array($consultarSql)) {
        $json[] = array(
            'idUpTask' => $row['id_upTask'],
            'nombre' => $row['Nombre'],
            'apellido' => $row['Apellido'],
            'documento' => $row['documento'],
            'idHomework' => $row['id_homework'],
            'archivo' => $row['archivo'],
            'nota' => $row['nota']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
}

?>