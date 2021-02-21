<?php
    
    require_once("../php/conexion.php");

    if($_POST['vertarea']){

        // consulta para ver tareas disponibles

        $tsql = "SELECT * FROM homework";
        $query1 = mysqli_query($cone, $tsql);
        $red = mysqli_fetch_assoc($query1);

        if($red){

            $_SESSION['homeworks'] = $red['id_homework'];
            $_SESSION['profesor'] = $red['id_teacher'];
            $_SESSION['nom_tare'] = $red['Nombre_tareas'];
            $_SESSION['descrip'] = $red['descripcion'];
            $_SESSION['archi'] = $red['archivos'];

            if($_SESSION['homeworks'] == 1){
                header("Location: tareasdisponibles.php");
                exit();
            }

        }

    }
?>