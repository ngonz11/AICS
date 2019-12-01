<?php require_once("connection.php");?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;background-image: url("wall2.jpg");height: 100%;}
* {box-sizing: border-box;}
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>

<form method="post" style="max-width:500px;margin:auto">
  <h2>Register Form</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Name" name="name" required>
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" onkeyup="check_user()" placeholder="Username" name="username" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="password" required>
  </div>

  <button name="register" id="register" type="submit" class="btn">Register</button>

  
</form>
<?php 
    if (isset($_POST['register'])) {
      $name = $_POST['name'];
      $username = $_POST['username'];
      $password = $_POST['password'];
    

    $q = "INSERT INTO `report` (`id`, `name`, `username`, `password`) VALUES ('', '".$name."', '".$username."', '".$password."')";
    $r = mysqli_query($con, $q);

    if ($r) {
        header("location:login.php");
    }
    else{
      echo $q;
    }
    }
?>
</body>
</html>
