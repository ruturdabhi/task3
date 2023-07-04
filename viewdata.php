<?php

include "db.php";


if(isset($_GET['id'])){
    global $connection;
    $id = $_GET['id'];
    $query = "SELECT * FROM `users` WHERE `id`=$id";
    $view = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($view);
   
    $id = $row['id'];
    $username = $row['Username'];
    $email = $row['Email'];
    $city = $row['City'];  
    $image = $row['image'];  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php 
           echo "<h1> Data of $username</h1>";
        ?>
        <table>
            <tr>
                <td>ID :</td>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <td>Username :</td>
                <td><?php echo $username; ?></td>
            </tr>
            <tr>
                <td>Email :</td>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <td>City :</td>
                <td><?php echo $city; ?></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><img src="../task3/images/<?php echo $image; ?>" alt="Sorry Image not found"> </td>
            </tr>
        
        </table>
    </div>
    <?php
echo "<div class='back_btn'>";
echo "<a href='userdashboard.php'>Back</a>";
echo "</div>";
?>
</body>
</html>

