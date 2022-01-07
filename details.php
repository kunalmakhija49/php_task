<?php
session_start();
//include('authenticate.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>details</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".filterbtn").click(function(){
                $(".mytable").toggle();
            })
        })
    </script>
    <style>
        .modal{
            display: none;
            position: fixed;
            padding-top: 100px;
            overflow: auto;
            width: 100%;
            height: 100%;
        }
        .modalcontent{
            margin: auto;
            width: 80%;
            border: 1px solid #888;
        }
        .close{
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
    </style>
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
        echo "<td>" ."<a href = 'update.php?ec=$row[employee_code]&nm=$row[name]&em=$row[email]&num=$row[mobile_number]
        &dp=$row[department]&dsg=$row[designation]&jn=$row[joining_date]'>Edit</td> " ;
        echo "</tr>";
        // echo"<br>";
    }
    echo "</table>";
    $total =mysqli_num_rows($result);
    echo $total;
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
<button onclick="logout.php" value="Logout">Logout</button>
<script>
    var editbtn = document.getElementById("editbtn");
    var modal = document.getElementById("mymodal");
    var span = document.getElementsByClassName("close")[0];
    var numberOfrows = "<?php echo"$total"?>";
    // alert("number of rows "+numberOfrows);

    editbtn.onclick = function(){
        for(i=0;i<numberOfrows;i++){
            (function(i){
                $("#editbtn").click(function (){
                    modal.style.display = "block";
                    alert(i);
                });
            })(i)
            
            
        }
        
    }
    span.onclick = function(){
        modal.style.display = "none";
    }
</script>

<form action="details.php" method="POST">
    <label for="department">Department:</label>
    <select name="department" id="department">
        <?php
        while($rowcount = $resultdistinct -> fetch_assoc()){

        
        ?>
        <option value=<?php echo $rowcount["department"] ?> name=<?php echo $rowcount["department"] ?>><?php echo $rowcount["department"] ?></option>
        <?php } ?>
    </select>
    <input type="submit" value="filter" class="filterbtn">
</form>

<?php
$departmentvalue = $_POST["department"];
// echo $departmentvalue;

$departmentsql = "SELECT * FROM details WHERE department = '$departmentvalue'"; //sql
$departmentdata = $conn->query($departmentsql); 
echo "<table border='1' class='mytable'>";
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
while($departmentrow = $departmentdata->fetch_assoc()){
    // echo "Employee id: ". $departmentrow["employee_code"]."<br>".
    // "Name: ". $departmentrow["name"]."<br>".
    // "Email: ". $departmentrow["email"]."<br>".
    // "Mobile Number: ".$departmentrow["mobile_number"]."<br>".
    // "department: " .$departmentrow["department"]."<br>".
    // "designation: ". $departmentrow["designation"]."<br>".
    // "Joining Date: ". $departmentrow["joining_date"];
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
