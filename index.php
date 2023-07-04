<?php
include "db.php";
?>
<!DOCTYPE html>
<html>
<head>

<title> User Login Form </title>
<style>

header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  position: relative;
  z-index: 1;

  max-width: 360px;
  margin: 0 auto 100px;
  background-color: lightblue;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.lab{
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.btn {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color: blue;
  width: 100%;
  border: 0;
  padding: 15px;
  color: white;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: blue;
  font-size: 12px;
}
.form .message a {
  color: red;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body {
  background-color: #10b4e9;
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}


</style>
</head>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
        <form action="index.php" class="login-form" method="POST">
          <input class="lab" type="email" placeholder="email" name="email">
          <input class="lab" type="password" placeholder="password" name="pwd">
          <input class="btn" type="submit" value="Login" name="login">
          <p class="message">Not registered? <a href="registration.php
          ">Register Now</a></p>
        </form>
      </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['login'])) {

    $connection = mysqli_connect('localhost', 'root', 'root', 'userdata');

    $email = $_POST['email'];
    $pwd = md5($_POST['pwd']);
    $query = " SELECT * FROM users WHERE Email = '$email' && Password = '$pwd'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header('Location: userdashboard.php');
    } else {
        echo "<script>alert('Check Email id or Password')</script>";
       
    }
}

?>