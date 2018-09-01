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
	<li><a href=<?php echo "admin_create.php?empid=$empid";?>>Register Employer</a></li>
	<li class="active"><a href=<?php echo "admin_company.php?empid=$empid";?>>Register Company</a></li>
	<li><a href="../index.php">Logout</a></li>
</ul>
</div>
<div>
	<h4 class="well"><?php echo strtoupper($rank).":  <span class='pull-right'>Register Company</span>"; ?></h4>
</div>
<form action=<?php echo "admin_company.php?empid=$empid";?> method="POST" enctype="multipart/form-data" >
<table class="table">
<tr><td>Upload Company Logo:</td><td><input type="file" name="photo" ></td></tr>
<tr><td class="well"><label for="uname">Company:</label></td><td><input type="text" name="company" id="uname" required="required"></td></tr>
<tr><td class="well"><label for="fname">Location:</label></td><td><input type="text" name="location" id="fname" required="required"></td></tr>
<tr><td class="well"><label for="lname">Description:</label></td><td><!-- <input type="text" name="description" id="lname" required="required"> -->
	<textarea name="description" placeholder="Type Company Description Here.." required="required"></textarea>
</td></tr>
<tr><td class="well"><label for="position">No.of Staff:</label></td><td><input type="text" name="staff" id="position" required="required"></td></tr>
<tr><td class="well"><label for="contact">Customer Care TelNo:</label></td><td><input type="text" name="contact" id="contact" required="required"></td></tr>
<tr><td class="well"><label for="email">Email:</label></td><td><input type="email" name="email" id="email" required="required"></td></tr>
<tr><td>&nbsp;</td><td class="well"><input type="submit" name="submit" value="Upload" class="btn btn-default"></td></tr>
</table>
</form>

</body>
<?php } ?>
</html>
<?php
if(isset($_POST['submit'])){
//photo

$photo_type=$_FILES['photo']['type'];
//if($photo_type=='image/jpeg'||$photo_type=='image/png'||$photo_type=='image/jpg'||$photo_type=='image/gif'){
$photo=$_FILES['photo']['name'];
$photo_data=$_FILES['photo']['tmp_name'];
	$company=$_POST['company'];
	$location=$_POST['location'];
	$description=$_POST['description'];
	$staff=$_POST['staff'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
if(empty($photo_data)){
$photo="http://localhost/security_system/logos/default_logo.png";
$create="INSERT INTO company VALUES('','$company','$location','$description','$photo','$staff','$contact','$email')";
$create_q=$db->query($create);

if($create_q){
	echo "<script>alert('Company Registered  Successfully');</script>";
}else{echo "<script>alert('Failed to Register Company');</script>";}

}else{
if(move_uploaded_file($photo_data,'../logos/'.$photo)){
$photo="http://localhost/security_system/logos/".$photo;
$create="INSERT INTO company VALUES('','$company','$location','$description','$photo','$staff','$contact','$email')";
$create_q=$db->query($create);
if($create_q){
	echo "<script>alert('Company Registered   Successfully');</script>";
}else{echo "<script>alert('Failed to Register Company ');</script>";}
}

}


////////dont touch
//}else{echo "<script>alert('Only jpg, png ,Gif images Allowed');</script>";}

 }
?>
