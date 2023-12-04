<?php
    session_start();
    session_destroy();
    header("location: ../login.php");
    if (!isset($_SESSION['uname'])) {
        header("location: ../login.php");
    }

?>