<?php
    require_once("../php/conexion.php");
    $tsql1 = "SELECT * FROM homework";
    $query2 = mysqli_query($cone, $tsql1);
    $red2 = mysqli_fetch_assoc($query2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas disponibles</title>
</head>
<body>
    <div class="tareasdisp">
        <h2>Tarea</h2>
        <h3>Nombre Tarea: <?php echo $red2 ['Nombre_tareas']?></h3>
        <h3>Descripcion: <?php echo $red2 ['descripcion']?></h3>
        <h3>Archivos: <?php echo $red2 ['archivos']?></h3>
        <form enctype="multipart/form-data" action="subir.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
            <p> Enviar mi archivo: <input name="subir_archivo" type="file" /></p>
            <p> <input type="submit" value="Enviar Archivo" /></p>
        </form>
    </div>
</body>
</html>