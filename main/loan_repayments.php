	<?php
	session_start();
	
 	include('dbcon.php');
	
		$id=$_POST['selector'];
 	$customer_id  = $_POST['customer_id'];
	$due_date  = $_POST['due_date'];

	if ($id == '' ){ 
	header("location: paidloan.php");
	?>
	

	<?php }else{
	
	if(isset($_POST['submit'])){
		if(empty($_POST['selector']) || !isset($_POST['selector'])){
			die('Loan required');
		}
		$query = "UPDATE accounts SET limit_checker = 0 WHERE customer_id = '" . $_POST['customer_id'] . "'";
		$res = mysql_query($query);	

	}
		$N = count($id);
for($i=0; $i < $N; $i++)
{
	mysql_query("update tbl_loans set loansAvailable=loansAvailable+1 where loan_id = '$id[$i]'")or die(mysql_error());	
}
$N = count($id);
for($i=0; $i < $N; $i++)
{
	mysql_query("update tbl_loansapplication set date_canceled=NOW() WHERE loan_id = '$id[$i]'")or die(mysql_error());
	$query = mysql_query("select * from tbl_loansapplication order by tbl_loansapplication_id DESC")or die(mysql_error());
	$row = mysql_fetch_array($query);
	$tbl_loansapplication_id  = $row['tbl_loansapplication_id']; 
	}

$N = count($id);
for($i=0; $i < $N; $i++)
{
	 mysql_query("update loan_application_details set loan_status='Paid' where loan_id = '$id[$i]'")or die(mysql_error());

}
?> 
<script>alert('Payment Request was Successful!')
            window.location.href = "index.php";</script>;
<?php


}  
?>
	
	

	
	