<?php
session_start();
function SecureMe($condition){
    if ($condition = "user") {
        if ($_SESSION['uname']) {
        } else {
            header("location: login.php");
        }
        echo "hello snoaw";
    } else {
        if (isset($_SESSION['uname'])) {
            header("location: account.php");
        }
    }
}
?>