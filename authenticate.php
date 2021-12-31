<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_form";

$adminemail = $_POST["loginemail"];
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("connection fail: " . $conn->connect_error);
}

$sqlwhere = "select * from admin where email ='$adminemail'";
$results = mysqli_query($conn,$sqlwhere);
$row = mysqli_fetch_assoc($results);
echo $row["email"];
?>