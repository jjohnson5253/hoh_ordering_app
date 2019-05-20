<?php

echo "
<a href='users_table.php'>
<input type='submit' value='Users' />
</a>";

// Table for current unfilled orders
// https://stackoverflow.com/questions/17902483/show-values-from-a-mysql-database-table-inside-a-html-table-on-a-webpage
echo "<h2>Current Unfulfilled Orders</h2>";
echo "<table border='1'>
<tr>
<th>User</th>
<th>Canned Fruit</th>
<th>Canned Vegetables</th>
<th>Canned Tuna</th>
<th>Peanut Butter</th>
<th>Chili</th>
<th>Pasta</th>
<th>Canned Soup</th>
<th>Snacks</th>
<th>Bread</th>
<th>Fresh Produce</th>
</tr>";

// Fill table
$mysqli = new mysqli('localhost', 'root', 'skate100', 'hoh_online_ordering');

$result = $mysqli->query("SELECT * FROM tblorders");

while($row = $result->fetch_assoc()) {

	echo "<tr>";
	echo "<td>" . $row['user'] . "</td>";
	if($row['CANFRUT'] == 1){
		echo "<td bgcolor = '#FF0'>" . $row['CANFRUT'] . "</td>";
	}
	else{
		echo "<td>" . $row['CANFRUT'] . "</td>";
	}
	if($row['CANVEGI'] == 1){
		echo "<td bgcolor = '#FF0'>" . $row['CANVEGI'] . "</td>";
	}
	else{
		echo "<td>" . $row['CANVEGI'] . "</td>";
	}
	if($row['TUNA'] == 1){
		echo "<td bgcolor = '#FF0'>" . $row['TUNA'] . "</td>";
	}
	else{
		echo "<td>" . $row['TUNA'] . "</td>";
	}
	if($row['PB'] == 1){
		echo "<td bgcolor = '#FF0'>" . $row['PB'] . "</td>";
	}
	else{
		echo "<td>" . $row['PB'] . "</td>";
	}
	if($row['CHILI'] == 1){
		echo "<td bgcolor = '#FF0'>" . $row['CHILI'] . "</td>";
	}
	else{
		echo "<td>" . $row['CHILI'] . "</td>";
	}
	if($row['PASTA'] == 1){
		echo "<td bgcolor = '#FF0'>" . $row['PASTA'] . "</td>";
	}
	else{
		echo "<td>" . $row['PASTA'] . "</td>";
	}
	if($row['CANSOUP'] == 1){
		echo "<td bgcolor = '#FF0'>" . $row['CANSOUP'] . "</td>";
	}
	else{
		echo "<td>" . $row['CANSOUP'] . "</td>";
	}
	if($row['SNACKS'] == 1){
		echo "<td bgcolor = '#FF0'>" . $row['SNACKS'] . "</td>";
	}
	else{
		echo "<td>" . $row['SNACKS'] . "</td>";
	}
	if($row['BREAD'] == 1){
		echo "<td bgcolor = '#FF0'>" . $row['BREAD'] . "</td>";
	}
	else{
		echo "<td>" . $row['BREAD'] . "</td>";
	}
	if($row['PRODUCE'] == 1){
		echo "<td bgcolor = '#FF0'>" . $row['PRODUCE'] . "</td>";
	}
	else{
		echo "<td>" . $row['PRODUCE'] . "</td>";
	}

	// add fulfill button and php reference
	echo "<td><a href='fulfill.php?id=".$row['user']."'>

	<input type='submit' value='Fulfill' class='btnFulfillAction' />

	</a></td>";

	// end table row
	echo "</tr>";
}

echo "</table>";

echo "<br><br>";

// Table for fulfilled orders
echo "<h2>Fulfilled Orders</h2>";
echo "<table border='1'>
<tr>
<th>User</th>
<th>Canned Fruit</th>
<th>Canned Vegetables</th>
<th>Canned Tuna</th>
<th>Peanut Butter</th>
<th>Chili</th>
<th>Pasta</th>
<th>Canned Soup</th>
<th>Snacks</th>
<th>Bread</th>
<th>Fresh Produce</th>
</tr>";

// Fill table
$mysqli = new mysqli('localhost', 'root', 'skate100', 'hoh_online_ordering');

$result = $mysqli->query("SELECT * FROM tblfulfilledorders");

while($row = $result->fetch_assoc()) {

	echo "<tr>";
	echo "<td>" . $row['user'] . "</td>";
	echo "<td>" . $row['CANFRUT'] . "</td>";
	echo "<td>" . $row['CANVEGI'] . "</td>";
	echo "<td>" . $row['TUNA'] . "</td>";
	echo "<td>" . $row['PB'] . "</td>";
	echo "<td>" . $row['CHILI'] . "</td>";
	echo "<td>" . $row['PASTA'] . "</td>";
	echo "<td>" . $row['CANSOUP'] . "</td>";
	echo "<td>" . $row['SNACKS'] . "</td>";
	echo "<td>" . $row['BREAD'] . "</td>";
	echo "<td>" . $row['PRODUCE'] . "</td>";

	// add delete button and php reference
	echo "<td>
	<a href='delete.php?id=".$row['user']."'>
	<input type='submit' value='Delete' class='btnDeleteAction' /></a>
	<br><br>
	<a href='unfulfill.php?id=".$row['user']."'>
	<input type='submit' value='Unfulfill' class='btnUnfulfillAction' />
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