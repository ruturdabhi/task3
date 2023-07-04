<?php

if(isset($_POST['addstandard'])){
    $connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
    
    $standard = $_POST['standard'];
    $query = "INSERT INTO `standards` (`standard`) VALUES ('$standard')";
    $result = mysqli_query($connection,$query);
    if($result){
        echo "<script>alert('New standard has been added')</script>";
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
</style>
<body>

<h1>Explore Standards Here</h1>
<form action="" method="post" enctype="multipart/form-data">
<label>To add new standard :</label>
<input type="text" name="standard" value="" placeholder="Ex:8"> 
<button name="addstandard">Add</button><br> <br>


<label>To view all standard :</label>
<input type="submit" name="viewstandards" value="view standards">
</form> <br> <br>
<!-- <div class='back_btn'> -->
<a href='educationportal.php'>Back</a>
<!-- </div> -->
</body>
</html>

<?php  

if (isset($_POST['viewstandards'])) {
   

    $connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
    
    $query1 = "Select * from standards";
    $result = mysqli_query($connection,$query1);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border=2 align=center>
        <thead>
        <tr>
        <th>ID</th>
        <th>Standard</th>
        <th>Update_Data</th>
        <th>Delete_Data</th>
        </tr>
    </thead> <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['standard'] . "</td>

        <td> <a href=updatestandard.php?id=$row[id]>Edit</a></td>
        <td> <a href=deletestandard.php?id=$row[id]>Delete</a></td>

         </tr>";
    }
    echo "</tbody>
        </table>";

    echo "<div class='back_btn'>";
    echo "<a href='standard.php'>Back</a>";
    echo "</div>";
}}

?>