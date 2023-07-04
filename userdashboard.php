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
    <style>
        tr, th, td {
            text-align: center;
        }
        table {
            border-color: black;
            border: 1px;
        }
        .back_btn {
            text-align: center;
        }
        a {
            text-decoration: none;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
        }
        .dashboard {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h3, label, button {
            margin-bottom: 10px;
        }
        h1 {
            color: #333333;
            font-size: 24px;
        }
        h3 {
            color: #666666;
            font-size: 18px;
        }
        label {
            color: #666666;
            font-size: 16px;
        }
        button, #logout_btn, .view_btn, #ed_portal{
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #4a86e8;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #ed_portal{
            margin-left: 21px;
        }
        
        .view_btn{
            margin-left: 10px;
        }
        #logout_btn{
            margin-left: 630px;
            
        }
        #new_user{
            margin-left: 25px;
        }

        button a {
            color: #ffffff;
            text-decoration: none;
        }
        button:hover {
            background-color: #386fdc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table thead tr th {
            background-color: #f0f0f0;
            color: #333333;
            padding: 10px;
        }
        table tbody tr td {
            padding: 10px;
        }
        .back_btn a {
            color: #4a86e8;
        }
        a{
            color: #4a86e8;
        }
    </style>
</head>
<body>
    <div class="menu-bar">
        <div class="vertical-line"></div>
        <form action="" method="post" style="margin-left: auto;">
            <?php if ($row['type'] == "admin" || $row['type'] == "teacher") { ?>
                <button id="ed_portal"><a href="educationportal.php">Education Portal</a></button>
            <?php } ?>
            <?php if ($row['type'] == "admin") { ?>
                <button><a href="cts.php">Assign Chapter</a></button>
            <?php } ?>
            <?php if ($row['type'] == "admin" || $row['type'] == "teacher") { ?>
                <button><a href="sts.php">Assign Subject</a></button>
                <button><a href="studtostd.php">Assign Student</a></button>
            <?php } ?>
            <button id="logout_btn"><a href="logout.php">Logout</a></button>
            <div class="dashboard">
        <h1>User Dashboard</h1>
        <h3>Hello <?php echo $row['Username'] ?>, Your role is <?php echo $row['type'] ?></h3>
        <label>To Add User:</label>
        <button id="new_user"><a href="newuser.php">Add user</a></button>
        <br>
        <label>To list all Data:</label>
        <input type="submit" class="view_btn" name="view" value="View Data">
    </div>
        </form>
    </div>

    

    <?php
    if (isset($_POST['view'])) {
        global $connection;
        $query1 = "SELECT * FROM users";
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
</body>
</html>
