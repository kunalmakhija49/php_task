<?php
session_start();
if (!isset($_SESSION["login_user"])) {
    header("location:login.php");
}

error_reporting(1);

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <center>
        <br>
        <br>
        <table>
            <form action="" method="get">
                <tr>
                    <td><label for="code">Employee code:</label></td>
                    <td><input type="text" id="eid" name="eid" class="form-control" value="<?php echo $ec ?>" readonly/>
                    </td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input type="text" id="name" class="form-control" value="<?php echo $name ?>" name="name"
                               required/></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>

                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" class="form-control" value="<?php echo $email ?>"
                               required/></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>

                <tr>
                    <td><label for="number">Mobile Number:</label></td>
                    <td><input type="text" id="number" name="number" class="form-control" value="<?php echo $number ?>"
                               required/></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>

                <tr>
                    <td><label for="dpt">Department:</label></td>
                    <td><input type="text" id="department" name="department" class="form-control"
                               value="<?php echo $department ?>" required></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>

                <tr>
                    <td><label for="dsg">Designation:</label></td>
                    <td><input type="text" id="designation" name="designation" class="form-control"
                               value="<?php echo $designation ?>" required/></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>

                <tr>
                    <td><label for="date">Joining Date:</label></td>
                    <td><input type="date" id="joindate" name="joindate" class="form-control"
                               value="<?php echo $joining ?>" required></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" class="btn btn-primary" value="Update"/></td>

                </tr>
            </form>
        </table>
    </center>

    </body>
    </html>
<?php

if ($_GET['submit']) {
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