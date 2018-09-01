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
	<li class="active"><a href=<?php echo "admin.php?empid=$empid";?>>Dashboard</a></li>
	<li><a href=<?php echo "admin_create.php?empid=$empid";?>>Register Employer</a></li>
	<li><a href=<?php echo "admin_company.php?empid=$empid";?>>Register Company</a></li>
	<li><a href="../index.php">Logout</a></li>
</ul>
</div>
<div>
	<h4 class="well">Welcome  &nbsp;&nbsp;&nbsp; <?php echo strtoupper($rank).":  <span class='pull-right'>".$name."</span>"; ?></h4>
</div>
<?php
$companies="SELECT * FROM company";
$companies_q=$db->query($companies);
?>
<h3 class="well">Registered Companies:</h3>
<table class="table">
	<tr>
	<td><div>

<table class="table">
<tr><td>&nbsp;</td><td class="well">Company:</td><td class="well">Company Description:</td><td class="well">No. of staff</td></tr>
	<?php
while($company_f=$db->getrow($companies_q))
{ ?>
	<tr><td class='well'><img src=<?php echo "{$company_f['url']}"; ?> style='width:100px;height:90px;' ></td><td><b><?php echo $company_f['company_name']; ?></b></td><td style='height:100px;overflow:auto;width:300px;'><?php echo $company_f['company_description']; ?></td><td><?php echo $company_f['staff']; ?></td></tr>
<?php } ?>

</table>
	</div></td>
	<td>
	<div>
	<table class="table">
		<tr><td>&nbsp;</td><td class="well">Employers:</td><td class="well">Companies:</td><td class="well">Rank:</td></tr>
	<?php
	$str="SELECT * FROM employer WHERE rank!='admin' ";
	$str_q=$db->query($str);
	while($str_f=$db->getrow($str_q)){
		$str2="SELECT * FROM company WHERE company_ID={$str_f['company_ID']}";
		$str3=$db->query($str2);
		while($str4=$db->getrow($str3)){ ?>
		 <tr><td class="well"><img src=<?php echo "{$str_f['url']}"; ?> style='width:100px;height:90px;' alt='Photo unavailable'/></td><td><?php echo $str_f['emp_fname']."  ".$str_f['emp_lname']; ?></td><td><?php echo $str4['company_name']; ?></td><td><?php echo $str_f['rank']; ?></td></tr>
	<?php 	}
	}
	?>
	</table>
	</div>
	</td>
	</tr>
</table>
</body>
<?php } ?>
</html>
