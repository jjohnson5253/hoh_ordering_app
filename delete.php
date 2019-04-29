<?php

// retrieve id to delete
$id = $_GET['id'];

// open connection
$mysqli = new mysqli('localhost', 'root', 'skate100', 'hoh_online_ordering');

// remove order from fulfilled orders table
$mysqli->query("DELETE FROM tblfulfilledorders WHERE user = '".$id."'");

// close connection
mysqli_close($conn);

// stay on employee.php
header('Location: employee.php');

?>
