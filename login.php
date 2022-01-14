<?php

session_start();
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
//$email = $_POST["loginemail"];
//$pass= $_POST['loginpassowrd'];
//$sql = "SELECT * FROM admin WHERE email='$email' and password='$pass'";
//$result = $conn->query($sql);
//;
//if ($result->num_rows > 0){
//    $row = $result->fetch_assoc();
//    $_SESSION["user"]=$row["email"];
//    if($email==$row["email"]&&$pass==$row["password"]){
//        echo "<script> alert('Login Successfully')</script>";
//        header("location:Registration.php");
//    }else{
//        echo "email of password incorrect";
//    }
//}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $useremail = mysqli_real_escape_string($conn, $_POST["loginemail"]);
    $password = mysqli_real_escape_string($conn, $_POST["loginpassowrd"]);
    $user = "SELECT id FROM admin WHERE email='$useremail' and password = '$password' ";
    $result = mysqli_query($conn, $user);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    // $_SESSION["user"]=$row["email"];
    if ($count == 1) {
        //session_register("myusername");
        $_SESSION['login_user'] = $useremail;
        header("location:Registration.php");
    } else {
        $error = "your Email Address or password is invalid ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">


<head>

    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .box {
            border: #666666 solid 1px;
        }
    </style>
</head>

<body>
<center>
    <label for="login"><h2>Login</h2></label>
    <table>
        <form action="login.php" method="POST" class="form-group">
            <tr>
                <td><label for="email">Email Address:</label></td>
                <td><input type="email" id="loginemail" name="loginemail" class="form-control"/></td>
            </tr>
            <tr>
                <td><br></td>
                <td><br></td>
            </tr>

            <tr>
                <td><label for="pwd">Password:</label></td>
                <td><input type="password" name="loginpassowrd" id="loginpassword" class="form-control"/></td>
            </tr>

            <tr>
                <td><br></td>
                <td><br></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-primary"/>
                    <small><label for="signup"><a href="signup.php">signup</label></a></small>
                </td>
            </tr>
        </form>
    </table>
    <div><?php echo $error ?></div>
</center>


</body>

</html>