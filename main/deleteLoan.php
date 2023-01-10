<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM tbl_loans WHERE loan_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>