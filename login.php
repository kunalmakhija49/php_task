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

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $useremail = mysqli_real_escape_string($conn,$_POST["loginemail"]);
    $password = mysqli_real_escape_string($conn,$_POST["loginpassowrd"]);
    $user = "SELECT id FROM admin WHERE email='$useremail' and password = '$password' ";
    $result = mysqli_query($conn,$user);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1){
        //session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        header("location:Registration.php");
    
    
    
    }else{
        $error = "your Email Address or password is invalid ";
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">


<head>

    <title>Login</title>
    <style>
        .box {
            border:#666666 solid 1px;
         }
    </style>
</head>

<body>
    <center>
        <h2>Login </h2>
        <table>
            <form action="login.php" method="POST">
                <tr>
                    <td>Email Address:</td>
                    <td><input type="email" id="loginemail" name="loginemail" class="box" /></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="loginpassowrd" id="loginpassword" class="box"/></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" />
                    <small><a href="signup.php">signup</a>
                    </td>
                </tr>
            </form>
        </table>
        <div><?php echo $error ?></div>
    </center>

    
</body>

</html>