<?php

//include('authenticate.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>User Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php


    ?>
    <center>
        <label for="Registration">
            <h2>Registration Form</h2>
        </label>
        <br>
        <br>


        <table>
            <form action="display.php" method="post">
                <tr>
                    <!-- <td><label for="email">Email Address:</label></td> -->
                    <!-- <td><input type="email" id="loginemail" name="loginemail" class="form-control" /></td> -->
                    <td><label for="name">Name:</label></td>
                    <td><input type="text" id="name" name="name" class="form-control" required /></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" class="form-control" required /></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>

                <tr>
                    <td><label for="number">Mobile Number:</label> </td>
                    <td><input type="text" id="number" name="number" class="form-control" required /></td>
                </tr>

                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>

                <tr>
                    <td><label for="Department">Department:</label></td>
                    <td><input type="text" id="department" name="department" class="form-control" required></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td><label for="Designation">Designation:</label></td>
                    <td><input type="text" id="designation" name="designation" class="form-control" required /></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td><label for="Joining Date">Joining Date:</label></td>
                    <td><input type="date" id="joindate" name="joindate" class="form-control" required></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-success" value="Submit" /></td>
                    <td><label for="fetch"><a href="details.php">fetch existing records</a></label></td>
                </tr>
            </form>
        </table>
    </center>
</body>

</html>