<?php
    require_once("../php/conexion.php");
    $sql = "SELECT * FROM user WHERE user = '".$_SESSION['user']."'";
    $usuario = mysqli_query($cone, $sql);
    $full = mysqli_fetch_assoc($usuario);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesor</title>
</head>
<body>

    <div class="info">
        <h3>Nombre: <?php echo $full ['Nombre'];?></h3>
        <h3>Apellido: <?php echo $full ['Apellido'];?></h3>
        <h3>Correo: <?php echo $full ['Correo']?></h3>
    </div>                 

    <div class="exit">
        <a href="../php/cerrarSesion.php">SALIR</a>
    </div>

    
</body>
</html>