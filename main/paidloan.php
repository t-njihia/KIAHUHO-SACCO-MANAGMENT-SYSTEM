\<html>
<head>
<title>
Kiahuho Sacco
</title>
<?php
	require_once('auth.php');
?>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>



 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	


</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
         <?php include'sidebar.php'; ?>
		 <!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-money"></i> Loans
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active"> Loans</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<?php 
			include('../connect.php');
				$result = $db->prepare("select * from tbl_loansapplication
								LEFT JOIN accounts ON tbl_loansapplication.customer_id = accounts.customer_id
								LEFT JOIN loan_application_details ON tbl_loansapplication.tbl_loansapplication_id = loan_application_details.tbl_loansapplication_id
								LEFT JOIN tbl_loans on loan_application_details.loan_id =  tbl_loans.loan_id WHERE loan_status='pending'
								ORDER BY tbl_loansapplication.tbl_loansapplication_id");
				$result->execute();
				$rowcount = $result->rowcount();

			?>
			<div style="text-align:center;">
			Total Applied Loans Avialable: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>

			
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search Member..." autocomplete="off" />
<form method="post" action="loan_repayments.php">
<Button type="submit" name = "submit"  class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Submit Loan Payment </button><br><br><br>
<div style="float: left;" >
<span>Members : </span>
<select name="customer_id">

	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM accounts where limit_checker=1");
		$result->bindParam(':customer_id', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['customer_id']; ?>" ><?php echo $row['fname']; ?> <?php echo $row['sname']; ?> <?php echo $row['lname']; ?></option>
	<?php
	}
	?>
</select><br>
<input type="hidden" style="width:265px; height:30px;" name="date_requested" value="<?php echo date('D M Y') ?>"/>
<input type="hidden" style="width:265px; height:30px;" name="due_date" value="<?php $next_due_date=date('D M Y', strtotime("+30 days")); echo $next_due_date ?>"/>
</div>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width=""> Full Name </th>
			<th width=""> Duration</th>
			<th width=""> Due Date</th>
			<th width=""> Loan Amount</th>
			<th width=""> Contact</th>
			<th width=""> Select Loan To Pay</th>
			
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("select * from tbl_loansapplication
								LEFT JOIN accounts ON tbl_loansapplication.customer_id = accounts.customer_id
								LEFT JOIN loan_application_details ON tbl_loansapplication.tbl_loansapplication_id = loan_application_details.tbl_loansapplication_id
								LEFT JOIN tbl_loans on loan_application_details.loan_id =  tbl_loans.loan_id WHERE loan_status='pending'
								ORDER BY tbl_loansapplication.tbl_loansapplication_id");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['fname']; ?> <?php echo $row['sname']; ?> <?php echo $row['lname']; ?> </td>
			<td><?php echo $row['duration']; ?></td>
			<td><?php echo $row['due_date']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['mobile']; ?></td>
			

			<td>
			<input id="uniform_on" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $row['loan_id']; ?>" style="width:20px"</td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
</form>
<script type="text/javascript">		
$(".uniform_on").change(function(){
    var max=1;
    if( $(".uniform_on:checked").length == max ){
	
        $(".uniform_on").attr('disabled', 'disabled');
		         alert('One Payment at atime');
        $(".uniform_on:checked").removeAttr('disabled');
		
    }else{

         $(".uniform_on").removeAttr('disabled');
    }
})
</script>	
<div class="clearfix"></div>

</div>
</div>
</div>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteLoan.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
<?php include('footer.php');?>

</html>2z