<?php

// Table for current unfilled orders
// https://stackoverflow.com/questions/17902483/show-values-from-a-mysql-database-table-inside-a-html-table-on-a-webpage
echo "<h2>Registered Users</h2>";
echo "<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
<th>City</th>
<th>State</th>
<th>Zipcode</th>
<th>Phone number</th>
<th>Email</th>
<th>Date of Birth</th>
<th>Gender</th>
<th>Ethnicity</th>
<th>Work status</th>
<th>Veteran status</th>
<th>Received Public Assistance?</th>
<th>How did you hear about us?</th>
<th>Enrolled in School?</th>
<th>Household Size</th>
<th>Username</th>
<th>Password</th>
</tr>";

// Fill table
$mysqli = new mysqli('localhost', 'root', 'skate100', 'hoh_online_ordering');

$result = $mysqli->query("SELECT * FROM tblusers");

while($row = $result->fetch_assoc()) {

	echo "<tr>";
	echo "<td>" . $row['firstname'] . "</td>";
	echo "<td>" . $row['lastname'] . "</td>";
	echo "<td>" . $row['address'] . "</td>";
	echo "<td>" . $row['city'] . "</td>";
	echo "<td>" . $row['state'] . "</td>";
	echo "<td>" . $row['zipcode'] . "</td>";
	echo "<td>" . $row['phonenumber'] . "</td>";
	echo "<td>" . $row['birthdate'] . "</td>";
	echo "<td>" . $row['gender'] . "</td>";
	echo "<td>" . $row['ethnicity'] . "</td>";
	echo "<td>" . $row['workstatus'] . "</td>";
	echo "<td>" . $row['veteran'] . "</td>";
	echo "<td>" . $row['publicassistance'] . "</td>";
	echo "<td>" . $row['hearabout'] . "</td>";
	echo "<td>" . $row['schoolenrolled'] . "</td>";
	echo "<td>" . $row['householdsize'] . "</td>";
	echo "<td>" . $row['username'] . "</td>";
	echo "<td>" . $row['password'] . "</td>";

	// end table row
	echo "</tr>";
}

?>
<HTML>
<HEAD>
<TITLE>Employee</TITLE>
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link rel="icon" href="../img/favicon.ico" type="image/ico">
</HEAD>
<BODY>
</BODY>
</HTML>