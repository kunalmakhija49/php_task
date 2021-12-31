<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>details</title>
</head>
<body>
<form action="searchaction.php" method="POST">
<input type="text" placeholder="Search by ID" id="searchbar" name="searchbar"/>
<input type="submit"/>
</form>

<br>

    
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_form";

$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("connection fail: " . $conn->connect_error);
}

$sqlselect  = "SELECT * FROM details";
$result = $conn->query($sqlselect);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>";

    echo "<th>";
    echo "Employee code";
    echo "</th>";

    echo "<th>";
    echo "Name";
    echo "</th>";

    echo "<th>";
    echo "email";
    echo "</th>";

    echo "<th>";
    echo "mobile number";
    echo "</th>";

    echo "<th>";
    echo "department";
    echo "</th>";
    echo "<th>";
    echo "designation";
    echo "</th>";
    echo "<th>";
    echo "joining date";
    echo "</th>";
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {

        echo "</tr>";
        echo "<td>" . $row["employee_code"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["mobile_number"] . "</td>";
        echo "<td>" . $row["department"] . "</td>";
        echo "<td>" . $row["designation"] . "</td>";
        echo "<td>" . $row["joining_date"] . "</td>";
        echo "</tr>";
        // echo"<br>";
    }
    echo "</table>";
} else {
    echo "0 returns ";
}

$conn->close();
?>
</body>
</html>
