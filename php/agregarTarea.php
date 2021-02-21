<?php

require_once("conexion.php");

if(!empty($_POST["addNombre"]) && !empty($_POST["addDescripcion"])) {
    if(isset($_POST["addNombre"]) && isset($_POST["addDescripcion"])) {

        $nombre = $_POST["addNombre"];
        $descripcion = $_POST["addDescripcion"];

        if(empty($_FILES['addFile'])){

            $directorio = "../archivos/";
        
            $archivo = $directorio . basename($_FILES["addFile"]["name"]); // uploads/carta.pdf
            $nombreArchivo = $_FILES["addFile"]["name"];
            $tamañoArchivo = $_FILES["addFile"]["size"];
        
            if ($tamañoArchivo <= 209715200) {
        
                if(move_uploaded_file($_FILES["addFile"]["tmp_name"], $archivo)){
                    
                    $sql = "INSERT INTO homework (id_homework, id_teacher, Nombre_tareas, descripcion, archivos) VALUES (NULL, NULL, '$nombre', '$descripcion', '$archivo')";
                    $consultarSql = mysqli_query($cone, $sql);
        
                    echo'Se ha subido la tarea correctamente';
                } else {
                    echo "Ha ocurrido un error al subir la tarea";
                }
        
            } else {
                echo "El peso del archivo es superior a 200MB";
            } 
        } else {
            $sql = "INSERT INTO homework (id_homework, id_teacher, Nombre_tareas, descripcion, archivos) VALUES (NULL, NULL, '$nombre', '$descripcion', NULL)";
            $consultarSql = mysqli_query($cone, $sql);

            echo'Se ha subido la tarea correctamente';
        }
    }
} else {
    echo "Rellene todos los campos requeridos";
}



?>