<?php
    include('conn.php');
    function checkExist($col, $value, $text, $conn){
        $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `$col`='$value'");
        if(mysqli_num_rows($query)>0){
            echo $text . ' exists, try something else';
            exit();
        }
    }
    $uname= $_POST['username'];
    $password= md5($_POST['Password']);
    $uid     = uniqid();
if (isset($_GET['r']) && $_GET['r'] == 'signup') {
    $firstname= $_POST['fname'];
    $lastname = $_POST['lname'];
    $email    = $_POST['email'];
    $number   = $_POST['number'];
    checkExist('uname', $uname, 'Username', $conn);
    checkExist('email', $email, 'Email', $conn);
    checkExist('number', $number, 'Phone Number', $conn);
    $sql     ="INSERT INTO `users`(`firstname`, `lastname`, `uname`, `email`, `number`, `password`, `uid`) VALUES ('$firstname','$lastname','$uname','$email','$number','$password','$uid')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo 1;
    } else {
        echo "Opps, Failed to register";
    }
} else {
    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `uname`='$uname' AND `password`='$password'");
    if(mysqli_num_rows($query)>0){
        $row = mysqli_fetch_assoc($query);
        session_start();
        $_SESSION['uname'] = $row['uname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['uid']   = $row['uid'];
        echo 1;
    } else {
        echo "Opps, Incorect username or password";
    }
}
?>