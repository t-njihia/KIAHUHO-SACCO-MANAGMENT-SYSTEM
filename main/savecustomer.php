<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['sname'];
$c = $_POST['lname'];
$d = $_POST['mobile'];
$e = $_POST['dob'];
$f = $_POST['gender'];
$g = $_POST['marital'];
$h = $_POST['id'];
$i = $_POST['occupation'];
$j = $_POST['email'];
$k = $_POST['address'];
$m = $_POST['county'];
// query
$sql = "INSERT INTO accounts (fname,sname,lname,mobile,dob,gender,marital,id,occupation,email,address,county) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:m)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':m'=>$m));
header("location: customer.php");
 

?>