<?php

$table_id = $_POST["searchbar"];
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_form";

$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("connection fail: " . $conn->connect_error);
}
$sql="SELECT * FROM details where employee_code = '$table_id' ";

// $stmt->bind_param("i",$id);
// // $id = $table_id;
// $stmt->execute();
// $result = $stmt->get_result();
$result = $conn->query($sql);


while($row = $result->fetch_assoc()){
    echo "Employee Code: " . $row["employee_code"]."<br>"."Name: ".$row["name"]."<br>".
    "Email:".$row["email"]."<br>"."Number: ".$row["mobile_number"]."<br>"."Department: ".$row["department"]."<br>"
    ."Designation: ".$row["designation"]."<br>"
    ."Joining Date: ".$row["joining_date"];
}
 
// $stmt->close();
$conn->close();


?>