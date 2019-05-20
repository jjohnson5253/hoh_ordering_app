<?php

// retrieve id to delete
$id = $_GET['id'];

// open connection
$mysqli = new mysqli('localhost', 'root', 'skate100', 'hoh_online_ordering');

// add order to fulfilled orders table
$mysqli->query("INSERT INTO tblorders SELECT * FROM tblfulfilledorders WHERE user = '".$id."'");

// remove order from orders table
$mysqli->query("DELETE FROM tblfulfilledorders WHERE user = '".$id."'");

// close connection
mysqli_close($conn);

// stay on orders_table.php
header('Location: orders_table.php');

?>
