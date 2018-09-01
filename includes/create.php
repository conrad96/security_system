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
	<h3 class="well">&nbsp;<?php echo $rank." &nbsp;".$name;?> Create Employee :</h3>
</div>

<form action=<?php echo "create.php?empid=$empid"; ?> method="POST" enctype="multipart/form-data">
<table class="table">
<tr><td>Upload Passport Photo:</td><td><input type="file" name="photo" required="required"></td></tr>
<tr><td class="well"><label for="fname">First Name:</label></td><td><input type="text" name="fname" id="fname" required="required"></td></tr>
<tr><td class="well"><label for="lname">Last Name:</label></td><td><input type="text" name="lname" id="lname" required="required"></td></tr>
<tr><td class="well"><label for="position">Position:</label></td><td><input type="text" name="position" id="position" required="required"></td></tr>
<tr><td class="well"><label for="dob">Date Of Birth:</label></td><td><input type="date" name="dob" id="dob" required="required"></td></tr>
<tr><td class="well"><label for="contact">Contact:</label></td><td><input type="text" name="contact" id="contact" required="required"></td></tr>
<tr><td class="well"><label for="email">Email:</label></td><td><input type="email" name="email" id="email" required="required"></td></tr>
<!-- <tr><td class="well"><label for="company">Company:</label></td><td><input type="text" name="company" id="company" required="required"></td></tr>
 -->
<?php
$company="SELECT company_ID FROM employer WHERE emp_ID='$empid' LIMIT 1 ";
$company_q=$db->query($company);
$company_f=$db->getrow($company_q);
?>
<input type="hidden" value="<?php echo "{$company_f['company_ID']}"; ?>" name="company" />
<tr><td class="well"><label for="crecord">Criminal Record:</label></td><!-- <td><input type="text" name="crecord" id="crecord" required="required"></td> -->
<td><textarea name="crecord" style='width:300px;height:210px;' placeholder="Type criminal Record ...type N/A if Employee has no criminal Record" required="required" id="crecord"></textarea></td>
</tr>
<tr><td class="well"><label for="recommendation">Recommendation:</label></td><!-- <td><input type="text" name="recommendation" id="recommendation" required="required"></td> -->
<td><textarea name="recommendation" required="required"  style='width:300px;height:210px;' placeholder="Leave a comment for Recommendation to Employee..." ></textarea></td>
</tr>
<tr><td class='well'><label>Employement Status</label></td><td><input type='text' name='emp_status' placeholder='Type Employment Status.. Active, Resigned, Fired ' /></td></tr>
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
move_uploaded_file($photo_data,"../employees/".$photo);
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$position=$_POST['position'];
	$dob=$_POST['dob'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$company=$_POST['company'];
	$record=$_POST['crecord'];
	$recomend=$_POST['recommendation'];
	$url="http://localhost/security_system/employees/".$photo;
	$empStatus=$_POST['emp_status'];
$create="INSERT INTO employee VALUES('','$fname','$lname','$position','$dob','$company','$record','$recomend','$url','$contact','$email','$empStatus') ";
$create_q=$db->query($create);
if($create){
	echo "<script>alert('Employee Record Created Successfully');</script>";
}else{echo "<script>alert('Failed to Create Employee Record');</script>";}


//}else{echo "<script>alert('Only jpg, png ,Gif images Allowed');</script>";}

}
?>
