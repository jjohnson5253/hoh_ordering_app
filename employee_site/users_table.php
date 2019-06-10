<?php

echo "
<a href='orders_table.php'>
<input type='submit' value='Orders' />
</a>";

// Table for current unfilled orders
// https://stackoverflow.com/questions/17902483/show-values-from-a-mysql-database-table-inside-a-html-table-on-a-webpage
echo "<h2>Registered Users</h2>";
echo "<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
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
	echo "<td>" . $row['householdsize'] . "</td>";
	echo "<td>" . $row['username'] . "</td>";
	echo "<td>" . $row['password'] . "</td>";

	// add delete button and php reference
	echo "<td>
	<a href='delete_user.php?id=".$row['username']."'>
	<input type='submit' value='Delete' class='btnDeleteAction' /></a>
	</td>";

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