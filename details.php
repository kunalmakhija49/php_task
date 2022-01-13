<?php
session_start();
error_reporting(1);
//include('authenticate.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>details</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".filterbtn").click(function() {
                $(".mytable").toggle();
            })
        })
    </script>
    <style>
        .modal {
            display: none;
            position: fixed;
            padding-top: 100px;
            overflow: auto;
            width: 100%;
            height: 100%;
        }

        .modalcontent {
            margin: auto;
            width: 80%;
            border: 1px solid #888;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        td,th {
            text-align: center;
        }
        h3{
            text-align: center;
        }
    </style>
</head>

<body>
    <br>
    <table align="right">

    <form action="searchaction.php" method="POST">
        <td>
        <input type="text" placeholder="Search by ID" id="searchbar" name="searchbar" class="form-control" />
        </td>
        <td>
        <input type="submit" class="btn btn-success" value="Search"/>
        </td>
    </form>
    </table>

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
    echo "<h3><label for='detailedview'> Detailed View</label> </h3>";
    if ($result->num_rows > 0) {
        echo "<table border='1' class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";

        echo "<th scope='col'>";
        echo "Employee code";
        echo "</th>";

        echo "<th scope='col'>";
        echo "Name";
        echo "</th>";

        echo "<th scope='col'>";
        echo "Email";
        echo "</th>";

        echo "<th scope='col'>";
        echo "Mobile Number";
        echo "</th>";

        echo "<th scope='col'>";
        echo "Department";
        echo "</th>";
        echo "<th scope='col'>";
        echo "Designation";
        echo "</th>";
        echo "<th scope='col'>";
        echo "Joining date";
        echo "</th>";
        echo "</tr>";
        echo "</thead>";
        while ($row = $result->fetch_assoc()) {

            echo "</tr>";
            echo "<td>" . $row["employee_code"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["mobile_number"] . "</td>";
            echo "<td>" . $row["department"] . "</td>";
            echo "<td>" . $row["designation"] . "</td>";
            echo "<td>" . $row["joining_date"] . "</td>";
            echo "<td>" . "<a href = 'update.php?ec=$row[employee_code]&nm=$row[name]&em=$row[email]&num=$row[mobile_number]
        &dp=$row[department]&dsg=$row[designation]&jn=$row[joining_date]'>Edit</td> ";
            echo "</tr>";
            // echo"<br>";
        }
        echo "</table>";
        // $total = mysqli_num_rows($result);
        // echo $total;

    } else {
        echo "0 returns ";
    }
    $sqldropdown = "SELECT DISTINCT department from details";
    $resultdistinct = $conn->query($sqldropdown);


    ?>
    <br>
    <div id="mymodal" class="modal">
        <div class="modalcontent">
            <span class="close">&times;</span>
            <input type="text" placeholder="ID......">
        </div>
    </div>

    <button onclick="logout.php" value="Logout" class="btn btn-warning">Logout</button>
    <!-- <script>
        var editbtn = document.getElementById("editbtn");
        var modal = document.getElementById("mymodal");
        var span = document.getElementsByClassName("close")[0];
        var numberOfrows = "<?php echo "$total" ?>";
        // alert("number of rows "+numberOfrows);

        editbtn.onclick = function() {
            for (i = 0; i < numberOfrows; i++) {
                (function(i) {
                    $("#editbtn").click(function() {
                        modal.style.display = "block";
                        alert(i);
                    });
                })(i)


            }

        }
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script> -->

    <form action="details.php" method="POST">
        <label for="department">Department:</label>
        <select name="department" id="department" class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
            <?php
            while ($rowcount = $resultdistinct->fetch_assoc()) {


            ?>
                <option value=<?php echo $rowcount["department"] ?> name=<?php echo $rowcount["department"] ?>><?php echo $rowcount["department"] ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="filter" class="btn btn-primary">
    </form>

    <?php
    $departmentvalue = $_POST["department"];
    // echo $departmentvalue;
    
    $departmentsql = "SELECT * FROM details WHERE department = '$departmentvalue'"; //sql
    $departmentdata = $conn->query($departmentsql);
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
    while ($departmentrow = $departmentdata->fetch_assoc()) {
        echo "</tr>";
        echo "<td>" . $departmentrow["employee_code"] . "</td>";
        echo "<td>" . $departmentrow["name"] . "</td>";
        echo "<td>" . $departmentrow["email"] . "</td>";
        echo "<td>" . $departmentrow["mobile_number"] . "</td>";
        echo "<td>" . $departmentrow["department"] . "</td>";
        echo "<td>" . $departmentrow["designation"] . "</td>";
        echo "<td>" . $departmentrow["joining_date"] . "</td>";

        echo "</tr>";
    }
    $conn->close();
    ?>

</body>

</html>