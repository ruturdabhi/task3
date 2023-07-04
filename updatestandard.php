<?php
include "db.php";

$id = $_GET['id'];

$query1 = "SELECT * FROM standards WHERE id= '$id'";
$result = mysqli_query($connection, $query1);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">

<h1>Update Standard </h1>

<label>ID :</label>
<input type="number" value="<?php echo $row['id'] ?>" name="id" readonly> <br> <br>

<label>Subject :</label>
<input type="text" value="<?php echo $row['standard'] ?>" name="standardno"> <br> <br>

<input type="submit" value="Save changes" name="submit"> 

<?php

echo "<div class='back_btn'>"; 
echo "<br>";
echo "<a href='standard.php'>Back</a>";
echo "</div>";

?>

</form>

</body>
</html>

<?php
$connection = mysqli_connect('localhost', 'root', 'root', 'userdata');

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $standard = $_POST['standardno'];


    $query2 = "UPDATE standards SET id='$id',standard='$standard' WHERE id =$id";
    
    $result = mysqli_query($connection, $query2);

    if ($result) {
        echo "<script>alert('Data has been Updated')</script>";
    } else {
        echo "Something went wrong" . mysqli_error($connection);
    }
}
?>