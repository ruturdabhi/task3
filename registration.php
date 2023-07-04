<?php

if (isset($_POST['register'])) {
    $connection = mysqli_connect('localhost', 'root', 'root', 'userdata');

    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $pwd = $_POST['pwd'];
    $confpwd = $_POST['confpwd'];
    $hashpassword = md5($pwd);
    $accesstype = $_POST['accesstype'];

    if ($pwd !== $confpwd) {
        echo "<script>alert('Password and Confirm password Does not match')</script>";
    } else {
        $query = "INSERT INTO `users`(`Username`, `Email`, `City`, `Password`,`image`) VALUES ('$username','$email','$city','$hashpassword','')";
        $result = mysqli_query($connection, $query);


        $userid = mysqli_insert_id($connection);

        $query1 = "SELECT `id` FROM `accessType` WHERE type = '$accesstype'";
        $result2 = mysqli_query($connection,$query1);
        $row = mysqli_fetch_assoc($result2);

        
        $access_id = $row['id'];
        $query2 = "INSERT INTO `userType` (`user_id`, `access_type_id`) VALUES ( '$userid', '$access_id')";
        $result3=mysqli_query($connection,$query2);
       
        if(!$result){
            die('Query Failed!!'.mysqli_error($connection));
        }
        else{
            echo "Registered successfully";
        }
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

<style>
.container{
    display: flex;
    flex-direction: column;
    width: 25vw;
}
h1, p{
    text-align: center;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #10b4e9;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  align-items: center;
}

.container {
  display: flex;
}

.container {
  display: flex;
  flex-direction: column;
  width: 25vw;
}

h1, p {
  text-align: center;
}

input {
  margin: 0.25em 0em 1em 0em;
}
input,select {
  margin: 0.25em 0em 1em 0em;
  outline: none;
  padding: 0.5em;
  border: none;
  background-color: rgb(225, 225, 225);
  border-radius: 0.25em;
  color: black;
}
button {
  padding: 0.75em;
  border: none;
  outline: none;
  background-color: rgb(68, 18, 232);
  color: white;
  border-radius: 0.25em;
}

button:hover {
  cursor: pointer;
  background-color: rgb(41, 4, 164);
}
.form {
  position: relative;
  z-index: 1; 

  width: 360px;
  margin: 80px auto;
  background-color: lightblue;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

</style>
</head>
<body>
<form method="post" action="registration.php">
     
      <div class="form">
      <h1>Register</h1>
        <p>Kindly fill in this form to register.</p>
      <div class="label">

        <label for="username"><b>Username</b></label>

        <input type="text" placeholder="Enter username." name="username" required/><br>
          </div>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email"
          required/><br>

        <label for="city"><b>City </b></label>
        <input type="text" placeholder="Enter City" name="city" required/> <br>

        <label for="pwd"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd"
        required/><br>

        <label for="confpwd"><b>Confirm Password</b></label>
        <input type="password" placeholder="Repeat Password" name="confpwd"
           required/><br>

        <label for="Access Type">Access Type</label>
       <?php 
       echo "<select name='accesstype'>";
       $connection = mysqli_connect('localhost', 'root', 'root', 'userdata');
       $query ="SELECT type FROM accessType";
      
       $result = mysqli_query($connection, $query);
       while ($row = mysqli_fetch_assoc($result)){
        echo "<option>$row[type]</option>";
       }
       echo "</select>";
    
       ?> <br>
        <button type="submit" name="register">Register</button>

        <p>Already have an account? <a href="index.php">Log in</a>.</p>
        </div>
</form>

</body>
</html>