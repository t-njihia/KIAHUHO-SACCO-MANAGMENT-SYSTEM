<?php
session_start();
include('../connect.php');
$a = $_POST['loanName'];
$b = $_POST['duration'];
$c = $_POST['price'];
$d = $_POST['loansAvailable'];
$e = $_POST['isActive'];
// query
$sql = "INSERT INTO tbl_loans (loanName,duration,price,loansAvailable,isActive) VALUES (:a,:b,:c,:d,:e)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e));
header("location: loans.php");
 

?>