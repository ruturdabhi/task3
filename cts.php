<?php
include "db.php";
if(isset($_POST['assign'])){
    global $connection;

    $subjectName = $_POST['assignsub'];
    $chapterName = $_POST['assignchap'];

    $subjectid=mysqli_insert_id($connection);
    $query = "select subjectId from subjects where subject='$subjectName'";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
    $subjectid = $row['subjectId'];

    $chapterid=mysqli_insert_id($connection);
    $query1 = "select id from chapters where chapterName='$chapterName'";
    $result1 = mysqli_query($connection,$query1);
    $row = mysqli_fetch_assoc($result1);
    $chapterid = $row['id'];

    $query2 = "INSERT INTO `chapterToSubject`(`chapterId`, `subjectid`) VALUES ($chapterid,$subjectid)";
    $result2 = mysqli_query($connection,$query2);
    if($result2){
        echo "<script>alert('data has been added')</script>".mysqli_error($connection);
    } else{
        echo "something went wrong";
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
    <h1>Assign a chapter to particular subject </h1>
<form action="" method="post" enctype="">
<label >Select a chapter :</label>
<?php

echo "<select name='assignchap'>";
$connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
$query ="SELECT chapterName FROM chapters";

$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)){
 echo "<option>$row[chapterName]</option>";
}
echo "</select>";

?> <br> <br>
<label>Select subject :</label>
<?php

echo "<select name='assignsub'>";
$connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
$query ="SELECT subject FROM subjects";

$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)){
 echo "<option>$row[subject]</option>";
}
echo "</select>";
?> <br> <br>
<button name="assign">Assign</button> <br> <br>
<div class='back_btn'>
<a href='userdashboard.php'>Back</a>
    </div>
</form>
</body>
</html>