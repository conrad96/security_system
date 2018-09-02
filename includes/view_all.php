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
<?php include("emp_navigation.php"); ?>
</div>
<div>
	<h3 class="well"><img src=<?php echo "$path"; ?> width="100" height="95">&nbsp;<?php echo $rank." &nbsp;".$name;?>&nbsp;&nbsp; View Employee Record:</h3>
</div>
<?php
$employee=$_GET['empl'];
$employee_str="
SELECT 
employee.url ,
empl_fname,
empl_lname,
empl_dob,
employee.email,
company_name,
empl_position,
employee.contact,
empl_criminalrecord,
empl_recommendation,
empl_father_names,
empl_mother_names,
empl_father_dob,
empl_father_addr,
empl_former_employer
FROM employee INNER JOIN company ON employee.empl_company=company.company_ID WHERE employee.empl_ID='$employee' ";
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
<tr><td class="well"><b>Current Position:</b></td><td><?php echo $employee_f['empl_position'];?></td></tr>
<tr><td class="well"><b>Criminal Record:</b></td><td><?php echo $employee_f['empl_criminalrecord'];?></td></tr>
<tr><td class="well"><b>Recommendation:</b></td><td><?php echo $employee_f['empl_recommendation'];?></td></tr>
<tr><td class="well"><b>Father's Names:</b></td><td><?php echo $employee_f['empl_father_names']; ?></td></tr>
<tr><td class="well"><b>Mother's Names:</b></td><td><?php echo $employee_f['empl_mother_names']; ?></td></tr>
<tr><td class="well"><b>Father's D.O.B:</b></td><td><?php echo $employee_f['empl_father_dob']; ?></td></tr>
<tr><td class="well"><b>Father's Address:</b></td><td><?php echo $employee_f['empl_father_addr']; ?></td></tr>
<tr><td class="well"><b>Former Employer:</b></td><td><?php echo $employee_f['empl_former_employer']; ?></td></tr>
</table>
</body>
<?php }else{echo "<script>alert('Employee Doesnot Exist in Database');</script>";} } ?>
</html>
