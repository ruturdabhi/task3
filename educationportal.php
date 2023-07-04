<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Portal</title>
</head>
<style>

a{
    text-decoration: none;
    color: #ffffff;
}

.back_btn a{
    text-decoration: dashed;
    color: white;
}

.btn, .back_btn { 
    padding: 10px 20px;
    margin-top: 20px;
    background-color: #4a86e8;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

</style>
<body>

<h1> Education Portal </h1>
<label>To explore subjects :</label>
<button class="btn"><a href="subjects.php">Subjects</a></button> <br> <br>

<label>To explore chapters :</label>
<button class="btn"><a href="chapter.php">Chapters</a></button> <br> <br>

<label>To explore Standards :</label>
<button class="btn"><a href="standard.php">Standards</a></button> <br> <br>

<button class='back_btn'><a href='userdashboard.php'>Back</a></button>

</body>
</html>
