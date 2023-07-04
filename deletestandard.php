<?php
include "db.php";

if (isset($_GET['id'])) {
    global $connection;
    $id = $_GET['id'];
    $query = "DELETE FROM `standards` WHERE `id`=$id";
    $delete = mysqli_query($connection, $query);
    
    if (!$delete) {
        echo "error";
    } else {

        header('Location: standard.php');
        $_POST['viewstandards'] = true;
    }
}