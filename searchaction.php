<?php

$id = $_POST["searchbar"];
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_form";

$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("connection fail: " . $conn->connect_error);
}
$stmt = $conn->prepare("select * from details where id = '?' ");
$stmt->bind_param("i",)
 

?>