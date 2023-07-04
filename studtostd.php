<?php
include "db.php";
if(isset($_POST['assign'])){
    global $connection;

    $studName = $_POST['selectstud'];
    $stdName = $_POST['assignstand'];

    $studid=mysqli_insert_id($connection);
    $query = "select id from users where Username='$studName'";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
    $studid = $row['id'];

    $stdid=mysqli_insert_id($connection);
    $query1 = "select id from standards where standard=$stdName";
    $result1 = mysqli_query($connection,$query1);
    $row = mysqli_fetch_assoc($result1);
    $stdid = $row['id'];

    $query2 = "INSERT INTO `studentToStandard`(`studentId`, `standardId`) VALUES($studid,$stdid)";
    $result2 = mysqli_query($connection,$query2);
    if($result2){
        echo "<script>alert('data has been added')</script>";
    } else{
        echo "something went wrong".mysqli_error($connection);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student to standard</title>
</head>
<body>
    
<h1>Assign a student to particular standard</h1>
<form method="post">
<label>Select a student :</label>
<?php

echo "<select name='selectstud'>";
$connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
$query1 = "SELECT users.Username FROM users INNER JOIN userType ON users.id = userType.user_id INNER JOIN accessType ON userType.access_type_id = accessType.id WHERE accessType.type = 'student'";

$result = mysqli_query($connection, $query1);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $studentName = $row['Username'];
        echo "<option>$studentName</option>";
    }
}

echo "</select>";
?> <br> <br>
<label>Select standard:</label>
<?php

echo "<select name='assignstand'>";
$query ="SELECT standard FROM standards";

$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)){
    $standard = $row['standard'];
    echo "<option>$standard</option>";
}

echo "</select>";
?> <br> <br>
<button name="assign">Assign</button> <br> <br>
</form>

<div class='back_btn'>
<a href='userdashboard.php'>Back</a>
    </div>
</body>
</html>