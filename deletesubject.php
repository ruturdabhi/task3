<?php
include "db.php";

if (isset($_GET['id'])) {
    global $connection;
    $id = $_GET['id'];
    $query = "DELETE FROM `subjects` WHERE `subjectId`=$id";
    $delete = mysqli_query($connection, $query);
    // echo "ghi";
    if (!$delete) {
        echo "error" . mysqli_error($connection);
    } else {

        header('Location: subjects.php');
        $_POST['viewsubject'] = true;
    }
}
