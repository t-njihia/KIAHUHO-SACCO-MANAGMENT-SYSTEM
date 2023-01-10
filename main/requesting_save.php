	<?php
	session_start();
	
 	include('dbcon.php');
	
		$id=$_POST['selector'];
 	$customer_id  = $_POST['customer_id'];
	$due_date  = $_POST['due_date'];
	$date_requested=$_POST['date_requested'];

	if ($id == '' ){ 
	header("location: loan_application.php");
	?>
	

	<?php }else{
	
	if(isset($_POST['submit'])){
		if(empty($_POST['selector']) || !isset($_POST['selector'])){
			die('Room required');
		}
		$query = "UPDATE accounts SET limit_checker = 1 WHERE customer_id = '" . $_POST['customer_id'] . "'";
		$res = mysql_query($query);	

	}
		$N = count($id);
for($i=0; $i < $N; $i++)
{
	mysql_query("update tbl_loans set loansAvailable=loansAvailable-1 where loan_id = '$id[$i]'")or die(mysql_error());	
}
$N = count($id);
for($i=0; $i < $N; $i++)
{
	
	mysql_query("insert into tbl_loansapplication(customer_id,loan_id,date_requested,due_date) values ('$customer_id','$id[$i]','$date_requested','$due_date')")or die(mysql_error());
	$query = mysql_query("select * from tbl_loansapplication order by tbl_loansapplication_id DESC")or die(mysql_error());
	$row = mysql_fetch_array($query);
	$tbl_loansapplication_id  = $row['tbl_loansapplication_id']; 
	
}
$N = count($id);
for($i=0; $i < $N; $i++)
{
	 mysql_query("insert loan_application_details(loan_id,tbl_loansapplication_id,loan_status) values('$id[$i]','$tbl_loansapplication_id','pending')")or die(mysql_error());

}
?> 
<script>alert('Loan Processed Succesful!')
            window.location.href = "loan_application.php";</script>;
<?php


}  
?>
	
	

	
	