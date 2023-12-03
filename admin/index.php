<?php
    include 'php/conn.php';
    $users = mysqli_query($conn, "SELECT * FROM `users`");
    mysqli_data_seek($users, 0);
    $orders = mysqli_query($conn, "SELECT * FROM `orders`");
    mysqli_data_seek($orders, 0);
?>