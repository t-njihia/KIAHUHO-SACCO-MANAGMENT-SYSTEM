<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM tbl_savings WHERE tbl_savings_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>