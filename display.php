<?php
    session_start();
  // include('authenticate.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Display Data</title>
</head>
<body>

    
<?php


$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$department = $_POST["department"];
$designation = $_POST["designation"];
$date = $_POST["joindate"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_form";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("connection fail: " . $conn->connect_error);
}
// echo "connected Successfully";

//inserting new record
$sql = "INSERT INTO details (name,email,mobile_number,department,designation,joining_date) VALUES 
('$name','$email','$number','$department','$designation','$date')";

if ($conn->query($sql) === true) {
    echo "below record inserted";
} else {
    echo "Error " . $sql . "<br>" . $conn->error;
}
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $number;
echo "<br>";
echo $department;
echo "<br>";
echo $designation;
echo "<br>";
echo $date;
echo "<br>";
echo "<br>";


echo "<a href='details.php'>click here to retrive all records </a>";


 $conn -> close();
?>

</body>
</html>