<?php
// including the database connection file
include_once("config.php");
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$subject=$_POST['subject'];	
	
	// checking empty fields
	if(empty($firstname) || empty($lastname) || empty($subject)) {	
			
		if(empty($firstname)) {
			echo "<font color='red'>first name field is empty.</font><br/>";
		}
		
		if(empty($lastname)) {
			echo "<font color='red'>last name field is empty.</font><br/>";
		}
		
		if(empty($subject)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$sql = "UPDATE users SET firstname=:firstname, lastname=:lastname, subject=:subject WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':firstname', $firstname);
		$query->bindparam(':lastname', $lastname);
		$query->bindparam(':subject', $subject);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: table.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$sql = "SELECT * FROM info WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$subject = $row['subject'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="table.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="firstname" value="<?php echo $firstname;?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="lastname" value="<?php echo $lastname;?>"></td>
			</tr>
			<tr> 
				<td>Wish</td>
				<td><input type="text" name="subject" value="<?php echo $subject;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>