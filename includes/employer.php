<?php include("logo_header.php"); ?>
<?php if(isset($_GET['empid'])){?>
<?php $empid=$_GET['empid'];?>
<div>
<?php include("emp_navigation.php"); ?>
</div>
<?php
$str="SELECT * FROM employer WHERE emp_ID='$empid'";
 $emp=$db->query($str);
$emp_f=$db->getrow($emp);
if($emp_f){
	$path=$emp_f['url'];
 ?>
<?php include("emp_div_row.php"); ?>
<!-- section displays the employers details-->
<?php
$company="SELECT * FROM company WHERE company_ID={$emp_f['company_ID']}";
$company_q=$db->query($company);
$company_f=$db->getrow($company_q);
?>
<div>
<h4>Employers Details:</h4>
<table class="table">
	<tr><td><b>Employer's Names:</b></td><td><?php echo $emp_f['emp_fname']."&nbsp;&nbsp;".$emp_f['emp_lname'];?></td><td><a href=<?php echo "edit.php?empid=$empid&emp=name";?>>Edit</a></td></tr>
	<tr><td><b>Employer's Rank:</b></td><td><?php echo $emp_f['rank'];?></td><td><a href=<?php echo "edit.php?empid=$empid&rank=rank";?>>Edit</a></td></tr>
	<tr><td><b>Employer's Company:</b></td><td><b><?php echo $company_f['company_name'];?></b></td><td>&nbsp;</td></tr>
	<tr><td><b>Company Description:</b></td><td><?php echo $company_f['company_description'];?></td><td><a href=<?php echo "edit.php?empid=$empid&description=description&compid={$company_f['company_ID']}";?>>Edit</a></td></tr>
</table>
</div>
</body>
<?php } }?>
</html>
