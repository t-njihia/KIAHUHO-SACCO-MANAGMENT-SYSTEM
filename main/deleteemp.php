<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM employee WHERE empid= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>