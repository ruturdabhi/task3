
<?php
include "db.php";

$id = $_GET['id'];

$query1 = "SELECT * FROM users WHERE id= '$id'";
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
<style>

</style>
<body>

<form action="" method="post" enctype="multipart/form-data">

<h1>Update Information</h1>

<label>ID :</label>
<input type="number" value="<?php echo $row['id'] ?>" name="id" readonly> <br> <br>

<label>Username :</label>
<input type="text" value="<?php echo $row['Username'] ?>" name="Username"> <br> <br>

<label>Email :</label>
<input type="email" value="<?php echo $row['Email'] ?>" name="Email"> <br> <br>

<label>City :</label>
<input type="text" value="<?php echo $row['City'] ?>" name="City"> <br> <br>

<input type="file" name="image" accept=".jpg,.png,.jpeg"> <br> <br>

<input type="submit" value="Save changes" name="submit"> 

<?php

echo "<div class='back_btn'>"; 
echo "<br>";
echo "<a href='userdashboard.php'>Back</a>";
echo "</div>";

?>

</form>

</body>
</html>

<?php
$connection = mysqli_connect('localhost', 'root', 'root', 'userdata');

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $city = $_POST['City'];
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "../task3/images/".$filename;


    $query3 = "UPDATE users SET id='$id',Username='$username',Email='$email',City='$city',image='$filename' WHERE id =$id";
    
    $result = mysqli_query($connection, $query3);

    move_uploaded_file($tempname,$folder);

    if ($result) {
        echo "Data has been Updated";
    } else {
        echo "Something went wrong" . mysqli_error($connection);
    }
}

?>