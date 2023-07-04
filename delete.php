<?php
include "db.php";

if (isset($_GET['id'])) {
    global $connection;
    $id = $_GET['id'];
    $query = "DELETE FROM `users` WHERE `id`=$id";
    $delete = mysqli_query($connection, $query);
    
    if (!$delete) {
        echo "error";
    } else {

        header('Location: userdashboard.php');
        $_POST['view'] = true;
    }
}
