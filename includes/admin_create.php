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
	<li><a href=<?php echo "admin.php?empid=$empid";?>>Dashboard</a></li>
	<li class="active"><a href=<?php echo "admin_create.php?empid=$empid";?>>Register Employer</a></li>
	<li><a href=<?php echo "admin_company.php?empid=$empid";?>>Register Company</a></li>
	<li><a href="../index.php">Logout</a></li>
</ul>
</div>
<div>
	<h4 class="well"><?php echo strtoupper($rank).":  <span class='pull-right'>Create Employer</span>"; ?></h4>
</div>
<form action=<?php echo "admin_create.php?empid=$empid";?> method="POST" enctype="multipart/form-data">
<table class="table">
<tr><td>Upload Passport Photo:</td><td><input type="file" name="photo" required="required"></td></tr>
<tr><td class="well"><label for="uname">Username:</label></td><td><input type="text" name="uname" id="uname" required="required"></td></tr>
<tr><td class="well"><label for="fname">First Name:</label></td><td><input type="text" name="fname" id="fname" required="required"></td></tr>
<tr><td class="well"><label for="lname">Last Name:</label></td><td><input type="text" name="lname" id="lname" required="required"></td></tr>
<tr><td class="well"><label for="position">Rank:</label></td><td><input type="text" name="position" id="position" required="required"></td></tr>
<tr><td class="well"><label for="contact">Contact:</label></td><td><input type="text" name="contact" id="contact" required="required"></td></tr>
<tr><td class="well"><label for="email">Email:</label></td><td><input type="email" name="email" id="email" required="required"></td></tr>
<tr><td>&nbsp;</td><td><font color="red">*List of Registered companies</font></td></tr>
<tr><td class="well"><label for="company">Company:</label></td><td>
	<select name="company">
		<?php
$list="SELECT * FROM company";
$list_q=$db->query($list);
while($list_f=$db->getrow($list_q)){
echo "<option value='{$list_f['company_ID']}'>{$list_f['company_name']}</option>";
}
		?>
	</select>
</td></tr>
<tr><td class="well"><label for="pass">Password:</label></td><td><input type="password" name="pass" id="pass" required="required"></td></tr>
<tr><td class="well"><label for="pass2">Confirm Password:</label></td><td><input type="password" name="pass2" id="pass2" required="required"></td></tr>

<tr><td>&nbsp;</td><td class="well"><input type="submit" name="submit" value="Upload" class="btn btn-default"></td></tr>
</table>
</form>

</body>
<?php } ?>
</html>
<?php
if(isset($_POST['submit'])){
//photo
	if($_POST['pass']==$_POST['pass2']){
$photo_type=$_FILES['photo']['type'];
//if($photo_type=='image/jpeg'||$photo_type=='image/png'||$photo_type=='image/jpg'||$photo_type=='image/gif'){
	$photo=$_FILES['photo']['name'];
$photo_data=$_FILES['photo']['tmp_name'];
move_uploaded_file($photo_data,"../employer/".$photo);
	$uname=$_POST['uname'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$position=$_POST['position'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$company=$_POST['company'];
	$password=$_POST['pass2'];
$url="http://localhost/security_system/employer/".$photo;
$create="INSERT INTO employer VALUES('','$uname','$fname','$lname','$company','$password','$position','$url','$email','$contact') ";
$create_q=$db->query($create);
if($create_q){
echo "<script>alert('Employer Record Created Successfully');</script>";
}else{echo "<script>alert('Failed to Create Employee Record');</script>";}

//}else{echo "<script>alert('Only jpg, png ,Gif images Allowed');</script>";}

}else{echo "<script>alert('Passwords Dont match');</script>";} }
?>
