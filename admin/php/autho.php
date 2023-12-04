<?php
if ($_SESSION['login'] !== TRUE) {
    header('location: index.php');
} elseif ($_SESSION['login'] && isset($page) && ($page=='login') ) {
    header('location: home.php');
}
?>