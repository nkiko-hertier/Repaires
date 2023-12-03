<?php
// Step 1: Connect to your database using PDO
$dsn = 'mysql:host=localhost;dbname=progress';
$username = 'root';
$password = '';
$db = new PDO($dsn, $username, $password);

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$number = $_POST['phonenumber'];
$username = $_POST['uname'];
$password = $_POST['password'];
$email = $_POST['email'];
$type = $_POST['type'];

if (!empty($id)) {
    $pass_inc = ($password != '' || $id == '')? ",password=:password" : "";
    $sql = "UPDATE users SET firstname=:firstname, lastname=:lastname, number=:number, uname=:username, email=:email, type=:type". $pass_inc ." WHERE id=:id";
} else {
    $sql = "INSERT INTO users (firstname, lastname, number, uname, email, type, password) VALUES (:firstname, :lastname, :number, :username, :email, :type, :password)";
}

try {
    $stmt = $db->prepare($sql);

    if (!empty($id)) {
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    }

    $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindParam(':number', $number, PDO::PARAM_INT);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':type', $type, PDO::PARAM_STR);

    // Check if password is empty and if it's an insert query
    if ($password != '' || $id == '') {
        $password = md5($password);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    }

    $result = $stmt->execute();
    if ($result) {
        echo "<script>alert('User " . ($id ? "Updated" : "Created") . " Successfully')</script>";
    } else {
        die("<p class='error'>ERROR: Could not execute query</p>");
    }
} catch (PDOException $e) {
    die("<p class='error'>ERROR: Could not execute query: <strong>" . htmlspecialchars($e->getMessage()) . "</strong></p>");
}
?>