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
	<li><a href=<?php echo "employer.php?empid=$empid";?>>Dashboard</a></li>
	<li class="active"><a href=<?php echo "scan.php?empid=$empid";?>>Search</a></li>
	<li><a href=<?php echo "create.php?empid=$empid";?>>Register Employee</a></li>
	<li><a href="../index.php">Logout</a></li>
</ul>
</div>
<div>
	<h3 class="well"><img src=<?php echo "$path"; ?> style='width:150px;height:140px;' class='img-responsive img-thumbnail'>&nbsp;<?php echo strtoupper($rank);?> &nbsp;&nbsp;&nbsp; <span class='pull-right'>Search Employee Record:</span></h3>
</div>

<div id="search_results">
<table id="emps" class="table">

	<thead>
<tr>
<th>&nbsp;</th><th class="well">Employee:</th><th class="well">Company:</th><th class="well">Criminal Record:</th><th class="well">Employment Status:</th>
</th>
</tr>
	</thead>

<?php
$employees=$db->getEmployees();
$q=$db->query("SELECT * FROM employee");
if(!empty($db->getrow($q))){
	while($employees=$db->getrow($q))
	{
		?>
<?php
//gett data values
	}
}
 ?>
</table>

<script type="text/javascript">
var stack_stuff=[];
<?php
$f=$db->query("SELECT * FROM employee INNER JOIN company ON employee.empl_company=company.company_ID INNER JOIN employer ON company.company_ID=employer.company_ID WHERE employer.emp_ID='$empid' ");
$i=1;
while($get=$db->getrow($f)) { ?>
		stack_stuff.push({
				'#':"<?php echo $i; ?>",
				'employee':"<a href=<?php echo "view.php?empid={$empid}&empl={$get['empl_ID']}"; ?> ><?php echo "{$get['empl_fname']}  {$get['empl_lname']}"; ?></a>",
				'company':"<?php echo $get['company_name']; ?>",
				'criminal_record':"<?php echo str_replace('/','',$get['empl_criminalrecord']); 	?>",
				'status':"<?php echo $get['emp_status']; ?>"
			});
 <?php $i++; } ?>
</script>
<script type="text/javascript">

$(document).ready( function(){
	console.log(stack_stuff);
    $('#emps').DataTable({
			data: stack_stuff,
			columns: [
				{ data:	'#' },
        { data: 'employee' },
        { data: 'company' },
        { data: 'criminal_record' },
				{	data:	'status'	}
    						]
		});
} );
</script>

</div>
</body>
<?php } ?>
</html>
