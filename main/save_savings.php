<?php
session_start();
include('../connect.php');
$a = $_POST['customer_id'];
$b = $_POST['amount'];
$c = $_POST['date_contributed'];
// query
$sql = "INSERT INTO tbl_savings (customer_id,amount,date_contributed) VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c));
header("location: savings.php");
 

?>