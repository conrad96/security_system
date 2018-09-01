<?php include("logo_header.php"); ?>
<!-- Navigation-->
<div>
	<ul class="nav nav-tabs">
	<li class="active"><a href="index.php">Home</a></li>
	<li><a href="about/about.php">About</a></li>
	<li><a href="about/companies.php">Security Companies</a></li>
	</ul>
</div>
<!-- Title-->
<div>
	<h1 class="well"></h1>
</div>

<div id="form">
	<form action="index.php" method="POST">
	<table class="table">
<tr><td><div class="form-group">
	<label for="uname">Username:</label></td><td><input type="text" name="uname" id="uname" required="required" class="form-control">
		</div></td></tr>
		<tr>
	<td><div class="form-group">	
		<label for="uname">Password:</label></td><td><input type="password" name="pass" id="pass" required="required" class="form-control">
		</div></td>
		</tr>
		<tr><td>&nbsp;</td>
		<td><div class="form-group">
		<input type="submit" name="submit" value="Login" class="btn btn-default" class="form-control"></td>
		</div>
		</tr>
</table>
	</form>
</div>

</body>
</html>
<?php 
if(isset($_POST['submit'])){
$uname=$_POST['uname'];
$pass=$_POST['pass'];
//$result=clean($uname,$pass);
$str="SELECT * FROM employer WHERE emp_uname='$uname' AND emp_password='$pass' ";
$str_q=mysqli_query($db->connection,$str);
$str_f=mysqli_fetch_array($str_q);
if($str_f){
		if($str_f['rank']=='admin'){
			$db->log($str_f['emp_fname']." ".$str_f['emp_lname']);
			header("location: includes/admin.php?empid={$str_f['emp_ID']}");
		}else{
			$db->log($str_f['emp_fname']." ".$str_f['emp_lname']);
	header("location: includes/employer.php?empid={$str_f['emp_ID']}");		
		}

}else{
echo "<script>alert('Username or Password is Incorrect');</script>";
}

}
?>