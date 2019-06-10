<?php

$mysqli = new mysqli('localhost', 'root', 'skate100', 'hoh_online_ordering');

// $sql = "INSERT INTO tblusers(firstname) VALUES ('jake')";

$sql = "INSERT INTO tblusers(firstname, lastname, address, 
					city, state, zipcode, phonenumber, birthdate, 
					gender, ethnicity, workstatus, veteran, publicassistance,
					hearabout, schoolenrolled, householdsize, username, password) VALUES
				 ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["address"]."'
				 	,'".$_POST["city"]."','".$_POST["state"]."','".$_POST["zipcode"]."'
				 	,'".$_POST["phonenumber"]."','".$_POST["birthdate"]."','".$_POST["gender"]."'
				 	,'".$_POST["ethnicity"]."','".$_POST["workstatus"]."','".$_POST["veteran"]."'
				 	,'".$_POST["publicassistance"]."','".$_POST["hearabout"]."','".$_POST["schoolenrolled"]."'
				 	,'".$_POST["householdsize"]."','".$_POST["username"]."','".$_POST["password"]."')";

if ($mysqli->query($sql) === TRUE){
	echo "You have successfully registered.";

	echo "
	<a href='login.php'>
	<input type='submit' value='Login' />
	</a>";
} else {
	echo "error: " . $sql . "<br><br>" . $mysqli->error;
}

?>

<html>
<TITLE>Confirm Registration</TITLE>
<body>


</body>
</html>