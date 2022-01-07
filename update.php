<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_form";
$error = "";


$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("connection fail: " . $conn->connect_error);
}

$ec = $_GET['ec'];
$name = $_GET['nm'];
$email = $_GET['em'];
$number = $_GET['num'];
$department = $_GET['dp'];
$designation = $_GET['dsg'];
$joining = $_GET['jn'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>update</title>
</head>
<body>
<center>
        <table>
            <form action="" method="get">
                <tr>
                    <td>Employee code:</td>
                    <td><input type="text" id="eid" name="eid" value="<?php echo $ec ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" id="name" value="<?php echo $name ?>" name="name" required /></td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td><input type="email" id="email" name="email" value="<?php echo $email ?>" required /></td>
                </tr>

                <tr>
                    <td>Mobile Number:</td>
                    <td><input type="text" id="number" name="number" value="<?php echo $number ?>" required /></td>
                </tr>

                <tr>
                    <td>Department:</td>
                    <td><input type="text" id="department" name="department" value="<?php echo $department ?>" required></td>
                </tr>

                <tr>
                    <td>Designation:</td>
                    <td><input type="text" id="designation" name="designation" value="<?php echo $designation ?>" required /></td>
                </tr>

                <tr>
                    <td>Joining Date:</td>
                    <td><input type="date" id="joindate" name="joindate" value="<?php echo $joining ?>" required></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" /></td>
                    
                </tr>
            </form>
        </table>
    </center>
    
</body>
</html>
<?php

if($_GET['submit']){
    $employee_code = $_GET['eid'];
    $enteredname = $_GET['name'];
    $enteredemail = $_GET['email'];
    $enterednumber = $_GET['number'];
    $entereddepartment = $_GET['department'];
    $entereddesignation = $_GET['designation'];
    $enteredjoindate = $_GET['joindate'];

    $sql = "UPDATE details SET name = '$enteredname',email='$enteredemail',mobile_number='$enterednumber'
    ,department='$entereddepartment',designation='$entereddesignation',joining_date='$enteredjoindate' where
    employee_code='$employee_code'";

    if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record updated successfully')</script>";
    header("location:details.php");
    } else {
    echo "Error updating record: " . $conn->error;
    }
  
  $conn->close();

}

?>