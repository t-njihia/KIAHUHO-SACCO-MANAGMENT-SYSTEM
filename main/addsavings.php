<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="save_savings.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Savings</h4></center>
<hr>
<div id="ac">

<span>Members : </span>
<select name="customer_id"  style="width:265px; height:30px; margin-left:-5px;" >

	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM accounts");
		$result->bindParam(':customer_id', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['customer_id']; ?>" ><?php echo $row['fname']; ?> <?php echo $row['sname']; ?> <?php echo $row['lname']; ?></option>
	<?php
	}
	?>
</select><br>
<span>Amount: </span><input type="text" style="width:265px; height:30px;" name="amount" placeholder="amount contributed"/><br>
<input type="hidden" style="width:265px; height:30px;" name="date_contributed" value="<?php echo date('D M Y') ?>"/>

<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>