<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['Submit'])) {	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$subject = $_POST['subject'];
		
	// checking empty fields
	if(empty($firstname) || empty($lastname) || empty($subject)) {
				
		if(empty($firstname)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}
		
		if(empty($lastname)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		
		if(empty($subject)) {
			echo "<font color='red'>Subject field is empty.</font><br/>";
		}
		
		//link to the previous plastname
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO info(firstname, lastname, subject) VALUES(:firstname, :lastname, :subject)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':firstname', $firstname);
		$query->bindparam(':lastname', $lastname);
		$query->bindparam(':subject', $subject);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':firstname' => $firstname, ':subject' => $subject, ':lastname' => $lastname));
		
		//display success messlastname
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='table.php'>View Result</a>";
	}
}
?>
</body>
</html>