<?php
include "db.php";

if (isset($_GET['id'])) {
    global $connection;
    $id = $_GET['id'];
    $query = "DELETE FROM `chapters` WHERE `id`=$id";
    $delete = mysqli_query($connection, $query);
    
    if (!$delete) {
        echo "error";
    } else {

        header('Location: chapter.php');
        $_POST['viewchapter'] = true;
    }
}