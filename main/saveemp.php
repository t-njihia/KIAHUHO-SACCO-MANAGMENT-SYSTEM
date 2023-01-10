<?php
session_start();
include('../connect.php');
$a = $_POST['fname'];
$b = $_POST['sname'];
$c = $_POST['lname'];

// query
$sql = "INSERT INTO employeee (fname,sname,lname) VALUES (:a,:b,:c,)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c));
header("location: employeee.php");
 

?>