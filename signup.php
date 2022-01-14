<?php
error_reporting(1);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Sign up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        var password = document.getElementById('password');
        var confirmpassword = document.getElementById('confirmpassword');

        function checkpassword() {
            if (password == "") {
                alert("Please enter password");
                return false;
            } else if (confirmpassword == "") {
                alert("Please enter confirm password");
                return false;
            } else if (password != confirmpassword) {
                alert("password did not matched");
                return false;
            }
        }
    </script>
</head>

<body>

<center>
    <h2>Sign up Form</h2>
    <table>
        <form action="signup.php" method="POST" onsubmit="checkpassword(this)">
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="text" placeholder="Enter Email" name="email" id="email" class="form-control"></td>
            </tr>
            <tr>
                <td><br></td>
                <td><br></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" placeholder="Enter Password"
                           class="form-control"></td>
            </tr>
            <tr>
                <td><br></td>
                <td><br></td>
            </tr>
            <tr>
                <td><label for="confirmpassword">Confirm Password:</label></td>
                <td><input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm password"
                           class="form-control"></td>
            </tr>
            <tr>
                <td><br></td>
                <td><br></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Sign up" class="btn btn-primary"></td>
            </tr>
        </form>
    </table>
</center>

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
$useremail = $_POST['email'];
$userpassword = $_POST['password'];
$emailquery = "SELECT email from admin where email = '$useremail'";
$result = $conn->query($emailquery);
if ($result->num_rows > 0) {
    //echo "Email already used";
} else {


    $sql = "INSERT INTO admin (email,password) VALUES ('$useremail','$userpassword')";
    if ($conn->query($sql) === true) {
        echo "registered successfully";
        header("location:login.php");
        // exit();
    } else {
        echo "error" . $conn->error;
    }
}

?>
</body>

</html>