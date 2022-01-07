<?php
session_start();
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

// $sqlwhere = "select * from admin where email ='$adminemail'";
// $results = mysqli_query($conn,$sqlwhere);
// $row = mysqli_fetch_assoc($results);
// echo $row["email"];
$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($conn,"select email from admin where email ='$user_check'");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['email'];
if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
}

?>