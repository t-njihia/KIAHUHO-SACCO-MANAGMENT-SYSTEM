<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="save_loans.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add New Loan</h4></center>
<hr>
<div id="ac">

<span>Cartegory : </span>
<select name="loanName"  style="width:265px; height:30px; margin-left:-5px;" >

	<option value="Short Loan" >Short Loan</option>
	<option value="Standard Loan" >Standard Loan</option>
	
</select><br>
<span>Amount: </span><input type="text" style="width:265px; height:30px;" name="price" placeholder="amount contributed"/><br>
<span>Duration: </span><input type="text" style="width:265px; height:30px;" name="duration" placeholder="Loan Duration"/><br>
<span>Available: </span><input type="text" style="width:265px; height:30px;" name="loansAvailable" placeholder="Loan eg.20"/><br>
<input type="hidden" style="width:265px; height:30px;" name="isActive" value="Y"/>

<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>