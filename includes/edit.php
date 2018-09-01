<?php include("logo_header.php"); ?>
<div>
<?php if(isset($_GET['empid'])){ $empid=$_GET['empid'];?>
<ul class="nav nav-tabs">
	<li class="active"><a href=<?php echo "edit.php?empid=$empid"; ?>>Edit</a></li>
	<li><a href=<?php echo "employer.php?empid=$empid"; ?>>Exit</a></li>
</ul>
</div>
<h3 class="well">Edit Profile:</h3>
<?php 
if(isset($_GET['emp'])=='name'){ ?>
<form action=<?php echo "edit.php?empid=$empid";?> method="POST" role="form">
<table class="table"><tr>
<td><div class="form-group">
<label class="form-control">Edit First Name:</label></td><td><input type="text" name="fname" placeholder="Type First Name Here..." class="form-control" required="required"></td>
</div></tr><tr><td>
<div class="form-group">
<label class="form-control">Edit Last Name:</label></td><td><input type="text" name="lname" placeholder="Type Last Name Here..." class="form-control" required="required"></td>
<tr><td>&nbsp;</td>
<td><input type="submit" name="name" value="Save" class="btn btn-default"></td></tr>
</div>
</table>
</form>
<?php } ?>
<?php if(isset($_GET['rank'])=='rank'){ ?>
<form action=<?php echo "edit.php?empid=$empid";?> method="POST" role="form">
<table class="table">
<tr><td>
<div class="form-group">
<label class="form-control">Edit Rank:</label></td><td><input type="text" name="title" placeholder="Type new rank..." class="form-control" required="required"></td><tr><td>&nbsp;</td><td>
<input type="submit" name="rank" value="Update" class="btn btn-default" ></td></tr>
</div>
</table>
</form>
<?php } ?>
<?php if(isset($_GET['comp'])=='name'){ 
$compid=$_GET['compid'];
	?>
<form action=<?php echo "edit.php?empid=$empid&compid=$compid"; ?> method="POST" role="form">
<table class="table">
<tr><td>
<div class="form-group">
<label class="form-control">Edit Company Name:</label></td><td><input type="text" name="company" placeholder="Type New Company Name Here..." class="form-control" required="required"></td></tr><tr><td>&nbsp;</td><td>
<input type="submit" name="comp_name" value="Save" class="btn btn-default"></td></tr>
</div>
</table>
</form>
<?php } ?>
<?php if(isset($_GET['description'])=='description'){
$compid=$_GET['compid'];
	?>
<form action=<?php echo "edit.php?empid=$empid&compid=$compid"; ?> method="POST" role="form">
<table class="table">
<tr><td>
<div class="form-group">
<label class="form-control">Edit Description:</label></td><td><!-- <input type="text" name="description" placeholder="Type Description Here..." class="form-control"> -->
	<textarea name="description" class="form-control" placeholder="Type Description Here..." required="required"></textarea>
</td></tr><tr><td>&nbsp;</td><td>
<input type="submit" name="comp_desc" value="Save" class="btn btn-default"></td></tr>
</div>
</table>
</form>
<?php } ?>
</body>
<?php }?>
</html>
<?php 
if(isset($_POST['name'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$str="UPDATE employer SET emp_fname='$fname',emp_lname='$lname' WHERE emp_ID='$empid' ";
$update_q=$db->query($str);
if($update_q){header("location: employer.php?empid=$empid"); }else{echo "<script>alert('Failed to Update Names, Try Again');</script>"; }
}

if(isset($_POST['rank'])){
	$rank=$_POST['title'];
$str="UPDATE employer SET rank='$rank' WHERE emp_ID='$empid' ";
$update_q=$db->query($str);
if($update_q){ header("location: employer.php?empid=$empid"); }else{echo "<script>alert('Failed to Update Rank, Try Again');</script>"; }	
}

if(isset($_POST['comp_name'])){
$comp_name=$_POST['company'];
$compid=$_GET['compid'];
$str="UPDATE company SET company_name='$comp_name' WHERE company_ID='$compid' ";
$update_q=$db->query($str);
if($update_q){ header("location: employer.php?empid=$empid"); }else{echo "<script>alert('Failed to Update Company Name, Try Again');</script>"; }	
}

if(isset($_POST['comp_desc'])){
	$desc=$_POST['description'];
	$compid=$_GET['compid'];
	 
$str="UPDATE company SET company_description='$desc' WHERE company_ID='$compid' ";
$update_q=$db->query($str);
if($update_q){header("location: employer.php?empid=$empid");}else{echo "<script>alert('Failed to Company Description, Try Again');</script>";}	
}
?>

