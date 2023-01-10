<?php include "connect.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SACCO</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   <style type="text/css">
input
{
   
   border:1px solid #ccc;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-khtml-border-radius: 5px;
border-radius: 5px;   
}
#we
{
   width:900px;
   padding:20px;
   background-color:#b3ffff;
   border:1px solid #ccc;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
-khtml-border-radius: 10px;
border-radius: 10px;   
}
fieldset
{
   width: 800px;
   padding:20px;
   background-color:#b3ffff;
   border:1px solid #ccc;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
-khtml-border-radius: 10px;
border-radius: 10px;   
}
.error{
.error{
.error{
margin-top: 6px;
margin-bottom: 0;
color: #fff;
background-color: #D65C4F;
display: table;
padding: 5px 8px;
font-size: 11px;
font-weight: 600;
line-height: 14px;
  }
.green{
margin-top: 6px;
margin-bottom: 0;
color: #fff;
background-color: green;
display: table;
padding: 5px 8px;
font-size: 11px;
font-weight: 600;
line-height: 14px;
  }
  #sign_user
   {
	font-size:14px;
	color:#FFF;
	text-align:center;
	background-color:#3B5998;
	padding:10px;
	margin-top:10px;
	cursor: pointer;
	}#edit{
	height:25px;
	background-color:#ddd;
}
</style>
   </head>
 <?php

function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000);
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
$finalcode='010'.createRandomPassword();
?>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
       
        
        <div id="page-wrapper">

            

           


								
            <form action="" method="post">
							   <fieldset id="we"><fieldset>
									
									<legend>PERSONAL DETAILS</legend>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>First Name <span class="required">*</span></label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="name" id="name" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="lname" id="name" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Surname<span class="required">*</span></label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="sname" id="name" required>
                                        </div>
                                    </div>
									 <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>National id Number<span class="required">*</span></label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="idno" id="name" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Phone number <span class="required">*</span></label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="mobile" id="name" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Gender<span class="required">*</span></label><br/>
                                            <select value="" maxlength="100" class="form-control" name="gender" id="name"  required>
    
               <?php
	include('connect.php');
	$result = $db->prepare("SELECT * FROM gender");
		$result->bindParam(':genderid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['name']; ?></option>
	<?php
	}
	?>
              </select>
                                      
                                                     </div>
													 <div class="col-sm-4">
                                            <label>Marital Status<span class="required">*</span></label><br/>
                                            <select name="marital" value="" maxlength="100" class="form-control" id="name"  required>
    
                <option value="">Select Status </option>
                <option value="Married">Married</option>
                <option value="Divosed">Divoced</option>
                <option value="Single">Single</option>
              </select>
                                      
                                                     </div>
													  <div class="col-sm-4">
                                            <label>Occupation<span class="required">*</span></label><br/>
                                            <select name="occupation" value="" maxlength="100" class="form-control" id="name"  required>
    
                <option value=""> Source of Income</option>
                <option value="Employment">Employment</option>
                <option value="Business">Business</option>
                <option value="Pension">Pension</option>
              </select>
                                      
                                                     </div>
                                    </div>
									 <div class="form-group">
									 <div class="col-sm-4">
                                            <label>Date of Birth<span class="required">*</span></label>
                                            <input type="date" value="" maxlength="100" class="form-control" name="dob" id="name" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Email<span class="required">*</span></label>
                                            <input type="email" value="" maxlength="100" class="form-control" name="email" id="email1" required>
                                        </div>
										<div class="col-sm-4">
                                            <label>Address<span class="required">*</span></label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="adress" id="address" required>
                                        </div>
										<div class="col-sm-4">
                                            <label>Town<span class="required">*</span></label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="town" id="name" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Country <span class="required">*</span></label>
                                            <select  name="country" value="" placeholder="Country"  maxlength="100"  id="name" class="form-control" dropdown required>
     
<option>Select Country</option>
	<?php
	include('connect.php');
	$result = $db->prepare("SELECT * FROM countries");
		$result->bindParam(':countryid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['name']; ?></option>
	<?php
	}
	?>
</select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>County<span class="required">*</span></label>
                                                      
<select  name="county" value="" placeholder="County" maxlength="100"  id="name" class="form-control" dropdown required>
	  			
<option>Select County</option>
	<?php
	include('connect.php');
	$result = $db->prepare("SELECT * FROM counties");
		$result->bindParam(':countyid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['name']; ?></option>
	<?php
	}
	?>
                
              </select>
                                        </div>
										  </div>
									
									</fieldset><fieldset id="baa">
									<legend>PAYMENT DETAILS</legend>
									<div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Mode<span class="required">*</span></label>
                                            <input type="text"  value= "M-Pesa" maxlength="100" class="form-control" name="mode" id="name" Disabled>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Code <span class="required">*</span></label>
                                            <input type="text"  value= "" maxlength="100" class="form-control" name="code" id="name" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Amount<span class="required">*</span></label>
                                            <input type="text"  value= "" maxlength="100" class="form-control" name="amount" id="name" required>
                                        </div>
										
                                          
                                    </div> </fieldset>
									
									                 <div class="row">
                                    
                                </div>
                                <div align="center">
        <button type="submit" id="sign_user" name="Submit" onClick="Submit()">Register</bu>
      </div> 
                            </form> 
</fieldset>
          
                </div>
            </div>

<?php
include "connect.php";
$a = $_POST['name'];
$b = $_POST['sname'];
$c = $_POST['lname'];
$d = $_POST['mobile'];
$e = $_POST['dob'];
$f = $_POST['gender'];
$g = $_POST['marital'];
$h = $_POST['idno'];
$i = $_POST['occupation'];
$j = $_POST['email'];
$k = $_POST['adress'];
$l = $_POST['country'];
$m = $_POST['county'];
$n = $_POST['town'];
$o ='M-Pesa';
$p = $_POST['code'];
$q = $_POST['amount'];
$r = $finalcode;

// query
$sql = "INSERT INTO accounts (fname,sname,lname,mobile,dob,gender,marital,id,occupation,email,adress,country,county,town) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n)";
$x = $db->prepare($sql);
$x->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n));

$sql2 = "INSERT INTO opening (Trcode,Amount,Account,mid,mode) VALUES (:p,:q,:r,:h,:o)";
$w = $db->prepare($sql2);
$w->execute(array(':p'=>$p,':q'=>$q,':r'=>$r,':h'=>$h,':o'=>$o));
header("location: #");
 

?>         


        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
