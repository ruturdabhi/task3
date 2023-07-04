<?php

if(isset($_POST['addsubject'])){
    $connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
    
    $subject = $_POST['subject'];
    $query = "INSERT INTO `subjects` (`subject`) VALUES ('$subject')";
    $result = mysqli_query($connection,$query);
    if($result){
        echo "<script>alert('New subject has been added')</script>";
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
    <title>Subjects</title>
</head>
<style>
    .back_btn{
        text-align: center;
    }

    .add_sub, .viewsubject{
        padding: 5px 10px;
        margin-top: 20px;
        background-color: #4a86e8;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .back_btnn{
        padding: 5px 10px;
        /* margin-top: 20px; */
        background-color: #4a86e8;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .back_btnn a{ 
        color: #ffffff;
        text-decoration: none;
    }
</style>
<body>

<h1>Explore Subjects Here</h1>
<form action="" method="post" enctype="multipart/form-data">
<label>To add new subject :</label>
<input type="text" name="subject" value="" placeholder="Ex:maths"> 
<button class="add_sub" name="addsubject">Add</button><br> <br>


<label>To view all subjects :</label>
<input type="submit" class="viewsubject" name="viewsubject" value="view subjects">
</form> <br> <br>
<button class="back_btnn"><a href='educationportal.php'>Back</a></button>

</body>
</html>

<?php  

if (isset($_POST['viewsubject'])) {
   

    $connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
    
    $query1 = "Select * from subjects";
    $result = mysqli_query($connection,$query1);

    // $row = mysqli_fetch_assoc($result);
    

    if (mysqli_num_rows($result) > 0) {
        echo "<table border=2 align=center>
        <thead>
        <tr>
        <th>ID</th>
        <th>Subjects</th>
        <th>Update_Data</th>
        <th>Delete_Data</th>
        </tr>
    </thead> <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>" . $row['subjectId'] . "</td>
        <td>" . $row['subject'] . "</td>

        <td> <a href=updatesubject.php?id=$row[subjectId]>Edit</a></td>
        <td> <a href=deletesubject.php?id=$row[subjectId]>Delete</a></td>

         </tr>";
    }
    echo "</tbody>
        </table>";

    echo "<div class='back_btn'>";
    echo "<a href='subjects.php'>Back</a>";
    echo "</div>";
}}

?>