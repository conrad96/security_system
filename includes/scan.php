<?php include("logo_header.php"); ?>
<?php if(isset($_GET['empid'])){
	$empid=$_GET['empid'];
	$search="SELECT * FROM employer WHERE emp_ID='$empid' ";
	$search_q=$db->query($search);
	$emp_f=$db->getrow($search_q);
	$name=$emp_f['emp_uname'];
	$path=$emp_f['url'];
	$rank=$emp_f['rank'];  ?>
	<div>
<?php include("emp_navigation.php"); ?>
</div>
<?php include("emp_div_row.php"); ?>
<center><h4 class="well">Search Employee Record</h4></center>
<div id="search_results">
<table id="emps" class="table">
	<thead>
<tr>
<th>&nbsp;</th><th class="well">Employee:</th><th class="well">Company:</th><th class="well">Criminal Record:</th><th class="well">Employment Status:</th>
</th>
</tr>
	</thead>

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
				'criminal_record':"<?php echo $get['empl_criminalrecord']; 	?>",
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
