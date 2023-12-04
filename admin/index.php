<?php 
session_start();
if (isset($_SESSION['uname'])) {
    header("location: account.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/flex.css">
    <title>Apple-net Login</title>
    <style>
        body{
            min-height: 100vh;
        }
        .shadow{
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        }
    </style>
</head>
<body class="flex-center" onload="SendMe('home.php', '#login')">
    <div class="container col-lg-4 shadow s-padd12 s-border">
        <form action="./php/login.php?r=login" method="post" id="login">
            <div class="form-group">
                <h1>Login</h1>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-group">
                    <input type="text" name="username" placeholder="Enter username" class="form-control">
                    <div class="input-group-prepend">
                        <label class="input-group-text"><i class="fa fa-user"></i></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <div class="input-group">
                    <input type="Password" name="Password" placeholder="************" class="form-control">
                    <div class="input-group-prepend">
                        <label class="input-group-text"><i class="fa fa-lock"></i></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Login</button>
                <br><span class="custom-block">don't have account <a href="./register.php" class="danger-color">Register</a></span>
            </div>
        </form>
    </div>
        <script src="./js/submit.js"></script>
</body>
</html>