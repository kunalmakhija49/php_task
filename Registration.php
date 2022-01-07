<?php

//include('authenticate.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>User Registration</title>
</head>

<body>
    <?php


    ?>

    <h2 style="text-align: center;">Registration Form</h2>
    <br>
    <center>
        <table>
            <form action="display.php" method="post">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" id="name" name="name" required /></td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td><input type="email" id="email" name="email" required /></td>
                </tr>

                <tr>
                    <td>Mobile Number:</td>
                    <td><input type="text" id="number" name="number" required /></td>
                </tr>

                <tr>
                    <td>Department:</td>
                    <td><input type="text" id="department" name="department" required></td>
                </tr>

                <tr>
                    <td>Designation:</td>
                    <td><input type="text" id="designation" name="designation" required /></td>
                </tr>

                <tr>
                    <td>Joining Date:</td>
                    <td><input type="date" id="joindate" name="joindate" required></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" /></td>
                    <td><a href="details.php">fetch existing records</a></td>
                </tr>
            </form>
        </table>
    </center>
</body>

</html>