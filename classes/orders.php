<?php
// Step 1: Connect to your database using PDO
$dsn = 'mysql:host=localhost;dbname=progress';
$username = 'root';
$password = '';
$db = new PDO($dsn, $username, $password);

// Step 2: Retrieve the values from the form
$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$tech_id = $_POST['tech_id'];
$customer_id = $_POST['customer_id'];
$status = $_POST['status'];
$uid = uniqid();

// Step 3: Create the prepared statement
$sql = "INSERT INTO orders (name, type, tech_id, customer_id, status, uid) VALUES (:name, :type, :tech_id, :customer_id, :status, :uid)";
if ($id !== '') {
    $sql = "UPDATE orders SET name =:name, type =:type, tech_id =:tech_id, customer_id =:customer_id, status =:status WHERE id=:id";
}
try {
$stmt = $db->prepare($sql);

// Step 4: Bind the parameters
if($id !== '') $stmt->bindParam(':id', $id, PDO::PARAM_INT);
if($id == '')  $stmt->bindParam(':uid', $uid);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':tech_id', $tech_id);
$stmt->bindParam(':customer_id', $customer_id);
$stmt->bindParam(':status', $status);

// Step 5: Execute the statement
$result = $stmt->execute();
}  catch (PDOException $e) {
    die("<p class='error'>ERROR: Could not execute query: <strong>" . htmlspecialchars($e->getMessage()) . "</strong></p>");
}
if ($result) {
    echo "Data added";
} else {
    echo "Not Added";
}


?>