<?php
    require_once("conexion.php");
    if($_POST['enviar']){

        $usuario = $_POST["usu"];
        $clave = $_POST["contra"];
       
        //Consulta
        $consul = "SELECT * FROM  user WHERE user = '$usuario' AND password = '$clave'";
        $query = mysqli_query($cone, $consul);
        $redes = mysqli_fetch_assoc($query);

        
        if($redes){
            
            $_SESSION['documento'] = $redes['documento'];
            $_SESSION['user'] = $redes['user'];
            $_SESSION['password'] = $redes['password'];
            $_SESSION['Nombre'] = $redes['Nombre'];
            $_SESSION['Apellido'] = $redes['Apellido'];
            $_SESSION['Edad'] = $redes['Edad'];
            $_SESSION['Correo'] = $redes['Correo'];
            $_SESSION['tip_user'] = $redes['id_tip_user'];

            if($_SESSION['tip_user'] == 1){      //Admin 
                header("Location: ");
                exit();
            }
            
            elseif($_SESSION['tip_user'] == 2) { //Profesor
                header("Location: ../profesor/profesor.html");
                exit();
            }

            elseif($_SESSION['tip_user'] == 3) { //Estudiante
                header("Location: ../estudiante/inicio_estu.php");
                exit();
            }
        }
    
    else{
        header("Location: ../index.html");
        exit();
    }
}
?>