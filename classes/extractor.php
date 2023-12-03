<?php
    $query = mysqli_query($conn, "SELECT * FROM `users`");
    $users = mysqli_fetch_assoc($query);
    $query = mysqli_query($conn, "SELECT * FROM `orders`");
    $orders = mysqli_fetch_assoc($query);
?>