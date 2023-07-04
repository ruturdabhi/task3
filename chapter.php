<?php

if(isset($_POST['addchapter'])){
    $connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
    
    $chapter = $_POST['chapter'];
    $query = "INSERT INTO `chapters` (`chapterName`) VALUES ('$chapter')";
    $result = mysqli_query($connection,$query);
    if($result){
        echo "<script>alert('New chapter has been added')</script>";
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
    <title>Chapters</title>
</head>
<style>
 .back_btn{
    text-align: center;
 }
</style>
<body>

<h1>Explore chapters Here</h1>
<form action="" method="post" enctype="multipart/form-data">
<label>To add new chapter :</label>
<input type="text" name="chapter" value="" placeholder="Ex:pythagoras"> 
<button name="addchapter">Add</button><br> <br>


<label>To view all subjects :</label>
<input type="submit" name="viewchapter" value="view chapters">
</form> <br> <br>

<a href='educationportal.php'>Back</a>

</body>
</html>

<?php  

if (isset($_POST['viewchapter'])) {
   

    $connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
    
    $query1 = "Select * from chapters";
    $result = mysqli_query($connection,$query1);


    if (mysqli_num_rows($result) > 0) {
        echo "<table border=2 align=center>
        <thead>
        <tr>
        <th>ID</th>
        <th>chapter_name</th>
        <th>Update_Data</th>
        <th>Delete_Data</th>
        </tr>
    </thead> <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['chapterName'] . "</td>

        <td> <a href=updatechapter.php?id=$row[id]>Edit</a></td>
        <td> <a href=deletechapter.php?id=$row[id]>Delete</a></td>

         </tr>";
    }
    echo "</tbody>
        </table>";

    echo "<div class='back_btn'>";
    echo "<a href='chapter.php'>Back</a>";
    echo "</div>";
}}

?>