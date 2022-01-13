<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>searchaction</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
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
echo "<br>";
echo "<table border='1' class='table table-striped table-dark'>";
    echo "<tr>";

    echo "<th scope='col'>";
    echo "Employee code";
    echo "</th>";

    echo "<th scope='col'>";
    echo "Name";
    echo "</th>";

    echo "<th scope='col'>";
    echo "email";
    echo "</th>";

    echo "<th scope='col'>";
    echo "mobile number";
    echo "</th>";

    echo "<th scope='col'>";
    echo "department";
    echo "</th>";
    echo "<th scope='col'>";
    echo "designation";
    echo "</th>";
    echo "<th scope='col'>";
    echo "joining date";
    echo "</th>";
    echo "</tr>";

while($row = $result->fetch_assoc()){
    // echo "Employee Code: " . $row["employee_code"]."<br>"."Name: ".$row["name"]."<br>".
    // "Email:".$row["email"]."<br>"."Number: ".$row["mobile_number"]."<br>"."Department: ".$row["department"]."<br>"
    // ."Designation: ".$row["designation"]."<br>"
    // ."Joining Date: ".$row["joining_date"];

    echo "</tr>";
    echo "<td>" . $row["employee_code"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["mobile_number"] . "</td>";
    echo "<td>" . $row["department"] . "</td>";
    echo "<td>" . $row["designation"] . "</td>";
    echo "<td>" . $row["joining_date"] . "</td>";

    echo "</tr>";


}
 
// $stmt->close();
$conn->close();


?>
</body>
</html>
