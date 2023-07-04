<?php

session_start();
$email = $_SESSION['email'];

$connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
$query1 = "SELECT accessType.type, users.Username FROM users INNER JOIN userType ON users.id = userType.user_id INNER JOIN accessType ON userType.access_type_id = accessType.id WHERE users.Email = '$email'";
 
$result1 = mysqli_query($connection, $query1);
$row = mysqli_fetch_assoc($result1);
?>

<?php

if (!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] != true) {

    header("Location: index.php");
    exit;
}

$connection = mysqli_connect('localhost', 'root', 'root', 'userdata');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Board</title>
</head>
<style>
    tr, th, td{
        text-align: center;
    }
    table{
        border-color: black;
        border: 1px;
    }
    .back_btn{
        text-align: center;
    }
    a{
        text-decoration: none;
    }

</style>
<body>

<div class="dashboard">
<form action="" method="post" enctype="multipart/form-data">
<h1>User Dashboard</h1>
<h3>Hello <?php echo $row['Username']?> Your role is <?php echo $row['type'] ?></h3>
<label>To Add User :</label>
<a href="newuser.php"> Add user</a>
<br> <br>

<label>To list all Data :</label>
<button type="submit" name="view">View Data</button>
<br>
<br>
</div> 
<?php
if($row['type']=="admin"||$row['type']=="teacher"){?>

<label for="education">To check education portal :</label>
<button><a href="educationportal.php">Education Portal</a></button> <br> <br>
<?php }?>

<?php
if($row['type']=="admin"){?>

<label>To assign chapter to subject :</label>
<button><a href="cts.php">Assign</a></button> <br> <br>
<?php } ?>
<?php
if($row['type']=="admin"||$row['type']=="teacher"){?>

<label>To assign subject to standard :</label>
<button><a href="sts.php">Assign</a></button> <br> <br>

<label>To assign student to standard :</label>
<button><a href="studtostd.php">Assign</a></button> <br> <br>
<?php } ?>
<div class="logout">

<button><a href="logout.php">logout</a></button>
</div>
</form>

</body>
</html>


<?php

if (isset($_POST['view'])) {
   

    global $connection;
    $query1 = "Select * from users";
    $result = mysqli_query($connection, $query1);
    session_start();
  


    if (mysqli_num_rows($result) > 0) {
        echo "<table border=2 align=center>
        <thead>
        <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>City</th>

        <th>Update_Data</th>
        <th>Delete_Data</th>
        <th>View_Data</th>
        </tr>
    </thead> <tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['Username'] . "</td>
            <td>" . $row['Email'] . "</td>
            <td>" . $row['City'] . "</td>

            <td> <a href=update.php?id=$row[id]>Edit</a></td>
            <td> <a href=delete.php?id=$row[id]>Delete</a></td>
            <td> <a href=viewdata.php?id=$row[id]>View</a></td>

             </tr>";
        }
        echo "</tbody>
            </table>";

        echo "<div class='back_btn'>";
        echo "<a href='userdashboard.php'>Back</a>";
        echo "</div>";
    }
}
?>
