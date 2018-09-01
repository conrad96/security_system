
<?php include("logo_header.php");?>
<!-- <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title>Ndugari</title>
</head>
<body> -->
<!-- Navigation-->
<div>
	<ul class="nav nav-tabs">
	<li><a href="../index.php">Home</a></li>
	<li><a href="about.php">About</a></li>
	<li class="active"><a href="companies.php">Security Companies</a></li>
	</ul>
</div>
<!-- Title-->
<div>
	<h1 class="well">Registered Companies:</h1>
</div>
<p>
Below is a List Of All registered companies in the Ndugari Security System<p>
<table class="table">
	<tr><td class="well">&nbsp;</td><td class="well">Company:</td><td class="well">Location:</td><td class="well">Description:</td></tr>
<?php 
$companies="SELECT  * FROM company";
$companies_q=$db->query($companies);
while($com_f=$db->getrow($companies_q)){
?>	
<tr><td><img src=<?php echo "{$com_f['url']}"; ?> width='80' height='80'></td><td><?php echo "{$com_f['company_name']}"; ?></td><td><?php echo "{$com_f['location']}"; ?></td><td><?php echo "{$com_f['company_description']}"; ?></td></tr></tr>
<?php } ?>
</table>
</body>
</html>
