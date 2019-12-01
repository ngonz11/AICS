<?php 
session_start();
require_once("connection.php");?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url("wall.jpg");
}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  height: 30%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Login Form</h2>

<form method="post">
  <div class="imgcontainer">
    <img src="logo.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" name="username" placeholder="Enter Username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" name="password" placeholder="Enter Password" required>
        
    <button type="submit" name="login">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn"><a href="register.php">Register</a></button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
  <?php
    if (isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $q = 'SELECT * FROM `report` WHERE `username` = "'.$username.'" AND `password` = "'.$password.'"  ';

      $r = mysqli_query($con, $q);
      if ($r) {
        if (mysqli_num_rows($r) > 0){
          $_SESSION['username'] = $username;
          header("location:add.html");
        }else{
          echo '<center><p style="color:red" class="p">Your username and password do not matched<p></center>'; 
        }
      }else{
        echo $q; 
      }
    }
  ?>
</body>
</html>
