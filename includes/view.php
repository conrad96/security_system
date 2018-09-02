<?php include("logo_header.php"); ?>
<?php if(isset($_GET['empid'])||isset($_GET['field'])){
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
<h4 class="well"><img src=<?php echo "$path"; ?> style='width:150px;height:140px;' class='img-responsive img-thumbnail'>&nbsp;<?php echo strtoupper($rank);?> &nbsp;&nbsp;&nbsp; <span class='pull-right'>View Employee Record:</span></h4>
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
FROM employee INNER JOIN company ON employee.empl_company=company.company_ID WHERE employee.empl_ID='$employee'
";
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
<tr><td>First Name:</td><td><?php echo "{$employee_f['empl_fname']}";?></td><td><span class='pull-right'><a data-target="#myModal_fname" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
<tr><td>Last Name:</td><td><?php echo "{$employee_f['empl_lname']}";?></td><td><span class='pull-right'><a data-target="#myModal_lname" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
<tr><td>Age:</td><td><?php
$dob=$employee_f['empl_dob'];
$dob1=explode('-',$dob);
$current=date("Y"); $age=$current-$dob1[0]; echo $age." yrs";?></td><td>&nbsp;</td></tr>
<tr><td>Phone Number:</td><td><?php echo $employee_f['contact'];?></td><td><span class='pull-right'><a data-target="#myModal_contact" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
<tr><td>Email:</td><td><?php echo $employee_f['email'];?></td><td><span class='pull-right'><a data-target="#myModal_email" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
<tr><td class="well"><b>Company:</b></td><td><?php echo $employee_f['company_name'];?></td><td>&nbsp;</td></tr>
<tr><td class="well"><b>Position:</b></td><td><?php echo $employee_f['empl_position'];?></td><td><span class='pull-right'><a data-target="#myModal_position" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
<tr><td class="well"><b>Criminal Record:</b></td><td><?php echo $employee_f['empl_criminalrecord'];?></td><td><span class='pull-right'><a data-target="#myModal_record" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
<tr><td class="well"><b>Recommendation:</b></td><td><?php echo $employee_f['empl_recommendation'];?></td><td><span class='pull-right'><a data-target="#myModal_recommedation" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
<tr><td class="well"><b>Father's Names:</b></td><td><?php echo $employee_f['empl_father_names']; ?></td><td><span class='pull-right'><a data-target="#myModal_fatherNames" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
<tr><td class="well"><b>Mother's Names:</b></td><td><?php echo $employee_f['empl_mother_names']; ?></td><td><span class='pull-right'><a data-target="#myModal_motherNames" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
<tr><td class="well"><b>Father's D.O.B:</b></td><td><?php echo $employee_f['empl_father_dob']; ?></td><td><span class='pull-right'><a data-target="#myModal_fatherDOB" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
<tr><td class="well"><b>Father's Address:</b></td><td><?php echo $employee_f['empl_father_addr']; ?></td><td><span class='pull-right'><a data-target="#myModal_fatherAddr" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
<tr><td class="well"><b>Former Employer:</b></td><td><?php echo $employee_f['empl_former_employer']; ?></td><td><span class='pull-right'><a data-target="#myModal_formerEmployer" data-toggle='modal' data-backdrop='static'>Edit</a></span></td></tr>
</table>
</body>
<div id="myModal_fname" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit First Name</h4>
			</div>
				<div class="modal-body">
<?php $field_13='first'; ?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_13}"; ?> method="POST" class='form-horizontal'>
<div class="form-group">
<input type="text" name="new_val" placeholder="Edit First Name" class="form-control"/>
<input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
</div>
</form>
				</div>
    </div>
  </div>
</div>
<?php include("edit_modals.php"); ?>
<!-- LOgic -->
<?php
if(isset($_POST['edit']) && isset($_GET['field'])){
	$field=$_GET['field'];
	$sql="UPDATE employee SET ";
	switch($field){
		case 'first':
			$employee_id=$_GET['empl'];
			$new_val=$_POST['new_val'];
			$sql.=" empl_fname='".$new_val."' WHERE empl_ID='$employee_id' ";
			$query=$db->query($sql);
			if(!$query){
				echo "<script>alert('An Error Occured. Field not Updated');</script>";
			}
		break;

		case 'last':
			$employee_id=$_GET['empl'];
			$new_val=$_POST['new_val'];
			$sql.=" empl_lname='".$new_val."' WHERE empl_ID='$employee_id' ";
			$query=$db->query($sql);
			if(!$query){
				echo "<script>alert('An Error Occured. Field not Updated');</script>";
			}
		break;

		case 'contact':
			$employee_id=$_GET['empl'];
			$new_val=$_POST['new_val'];
			$sql.=" contact='".$new_val."' WHERE empl_ID='$employee_id' ";
			$query=$db->query($sql);
			if(!$query){
				echo "<script>alert('An Error Occured. Field not Updated');</script>";
			}
		break;

		case 'email':
			$employee_id=$_GET['empl'];
			$new_val=$_POST['new_val'];
			$sql.=" email='".$new_val."' WHERE empl_ID='$employee_id' ";
			$query=$db->query($sql);
			if(!$query){
				echo "<script>alert('An Error Occured. Field not Updated');</script>";
			}
		break;

		case 'position':
			$employee_id=$_GET['empl'];
			$new_val=$_POST['new_val'];
			$sql.=" empl_position='".$new_val."' WHERE empl_ID='$employee_id' ";
			$query=$db->query($sql);
			if(!$query){
				echo "<script>alert('An Error Occured. Field not Updated');</script>";
			}
		break;

		case 'record':
				$employee_id=$_GET['empl'];
				$new_val=$_POST['new_val'];
				$sql.=" empl_criminalrecord='".$new_val."' WHERE empl_ID='$employee_id' ";
				$query=$db->query($sql);
				if(!$query){
					echo "<script>alert('An Error Occured. Field not Updated');</script>";
				}
		break;

		case 'recommend':
			$employee_id=$_GET['empl'];
			$new_val=$_POST['new_val'];
			$sql.=" empl_recommendation='".$new_val."' WHERE empl_ID='$employee_id' ";
			$query=$db->query($sql);
			if(!$query){
				echo "<script>alert('An Error Occured. Field not Updated');</script>";
			}
		break;

		case 'father_names':
				$employee_id=$_GET['empl'];
				$new_val=$_POST['new_val'];
				$sql.=" empl_father_names='".$new_val."' WHERE empl_ID='$employee_id' ";
				$query=$db->query($sql);
				if(!$query){
					echo "<script>alert('An Error Occured. Field not Updated');</script>";
				}
		break;

		case 'mother_names':
				$employee_id=$_GET['empl'];
				$new_val=$_POST['new_val'];
				$sql.=" empl_mother_names='".$new_val."' WHERE empl_ID='$employee_id' ";
				$query=$db->query($sql);
				if(!$query){
					echo "<script>alert('An Error Occured. Field not Updated');</script>";
				}
		break;

		case 'father_dob':
				$employee_id=$_GET['empl'];
				$new_val=$_POST['new_val'];
				$sql.=" empl_father_dob='".$new_val."' WHERE empl_ID='$employee_id' ";
				$query=$db->query($sql);
				if(!$query){
					echo "<script>alert('An Error Occured. Field not Updated');</script>";
				}
		break;

		case 'father_addr':
				$employee_id=$_GET['empl'];
				$new_val=$_POST['new_val'];
				$sql.=" empl_father_addr='".$new_val."' WHERE empl_ID='$employee_id' ";
				$query=$db->query($sql);
				if(!$query){
					echo "<script>alert('An Error Occured. Field not Updated');</script>";
				}
		break;

		case 'former':
			$employee_id=$_GET['empl'];
			$new_val=$_POST['new_val'];
			$sql.=" empl_former_employer='".$new_val."' WHERE empl_ID='$employee_id' ";
			$query=$db->query($sql);
			if(!$query){
				echo "<script>alert('An Error Occured. Field not Updated');</script>";
			}
			break;
			default:
			echo "<script>alert('Invalid Field Selected...');</script>";
			break;
	}

}

?>
<?php }else{ echo "<script>alert('Employee Doesnot Exist in Database');</script>";} } ?>
</html>
