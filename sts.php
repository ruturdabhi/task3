
<?php
include "db.php";
if(isset($_POST['assign'])){
    global $connection;

    $subjectName = $_POST['selectsub'];
    $stdName = $_POST['assignstand'];

    $subjectid=mysqli_insert_id($connection);
    $query = "select subjectId from subjects where subject='$subjectName'";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
    $subjectid = $row['subjectId'];

    $stdid=mysqli_insert_id($connection);
    $query1 = "select id from standards where standard=$stdName";
    $result1 = mysqli_query($connection,$query1);
    $row = mysqli_fetch_assoc($result1);
    $stdid = $row['id'];

    $query2 = "INSERT INTO `subjectTostandard`(`subjectid`, `standardId`) VALUES($subjectid,$stdid)";
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
    <title>Assigning</title>
</head>
<body>
    <h1>Assign a subject to particular standard </h1>
<form action="" method="post">
<label >Select a subject :</label>
<?php

echo "<select name='selectsub'>";
$connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
$query ="SELECT subject FROM subjects";

$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)){
 echo "<option>$row[subject]</option>";
}
echo "</select>";

?> <br> <br>
<label>Select standard :</label>
<?php

echo "<select name='assignstand'>";
$connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
$query ="SELECT standard FROM standards";

$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)){
 echo "<option>$row[standard]</option>";
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