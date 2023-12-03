<?php
if(!defined('DB_SERVER')) define('DB_SERVER',"localhost");
if(!defined('DB_USERNAME')) define('DB_USERNAME',"root");
if(!defined('DB_PASSWORD')) define('DB_PASSWORD',"");
if(!defined('DB_NAME')) define('DB_NAME',"progress");

    $host = DB_SERVER;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $database = DB_NAME;

    $conn = mysqli_connect($host, $username, $password, $database);

// Step 1: Connect to your database using PDO
$dsn = 'mysql:host=localhost;dbname=progress';
$username = 'root';
$password = '';
$db = new PDO($dsn, $username, $password);
?>
