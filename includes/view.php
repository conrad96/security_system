<?php include("logo_header.php"); ?>
<?php if(isset($_GET['empid'])){
	$empid=$_GET['empid'];
	$search="SELECT * FROM employer WHERE emp_ID='$empid' ";
	$search_q=$db->query($search);
	$search_f=$db->getrow($search_q);
	$name=$search_f['emp_uname'];
	$path=$search_f['url'];
	$rank=$search_f['rank'];  ?>
	<div>
<ul class="nav nav-tabs">
	<li class="active"><a href=<?php echo "scan.php?empid=$empid";?>>Back</a></li>
	<li><a href=<?php echo "employer.php?empid=$empid";?>>Exit</a></li>
	<li><a href="../index.php">Logout</a></li>
</ul>
</div>
<div>
	<h3 class="well"><img src=<?php echo "$path"; ?> width="100" height="95">&nbsp;<?php echo $rank." &nbsp;".$name;?>&nbsp;&nbsp; View Employee Record:</h3>
</div>
<?php
$employee=$_GET['empl'];
$employee_str="SELECT * FROM employee INNER JOIN company ON employee.empl_company=company.company_ID WHERE employee.empl_ID='$employee' ";
$employee_q=$db->query($employee_str);
$employee_f=$db->getrow($employee_q);
if($employee_f){
	$url=$employee_f['url'];

?>
<table class="table">
<tr><td class="well">Employee Details:</td></tr>
<tr><td><b>Passport Photo</b></td><td><?php
if(empty($url)){echo "<font color='red'>Photo not Available</font>";}else{
?><img src=<?php echo "$url";  ?> width="250" height="250" /><?php } ?></td></tr>
<tr><td>First Name:</td><td><?php echo "{$employee_f['empl_fname']}";?></td></tr>
<tr><td>Last Name:</td><td><?php echo "{$employee_f['empl_lname']}";?></td></tr>
<tr><td>Age:</td><td><?php
$dob=$employee_f['empl_dob'];
$dob1=explode('-',$dob);
$current=date("Y"); $age=$current-$dob1[0]; echo $age." yrs";?></td></tr>
<tr><td>Phone Number:</td><td><?php echo $employee_f['contact'];?></td></tr>
<tr><td>Email:</td><td><?php echo $employee_f['email'];?></td></tr>
<tr><td class="well"><b>Company:</b></td><td><?php echo $employee_f['company_name'];?></td></tr>
<tr><td class="well"><b>Position:</b></td><td><?php echo $employee_f['empl_position'];?></td></tr>
<tr><td class="well"><b>Status:</b></td><td><?php echo $employee_f['empl_criminalrecord'];?></td></tr>
<tr><td class="well"><b>Purpose for Leaving:</b></td><td><?php echo $employee_f['empl_recommendation'];?></td></tr>
</table>
</body>
<?php }else{echo "<script>alert('Employee Doesnot Exist in Database');</script>";} } ?>
</html>
