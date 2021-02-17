<?php
   
    session_start();
    if(isset($_COOKIE[session_name()])) {
        setcookie(session_name(), "", time()-3600, "/");
    }

    unset($_SESSION['user']);
    unset($_SESSION['tip_user']);
    $_SESSION = array();
    session_destroy();
    session_write_close();
    header("Location: ../index.html")

?>