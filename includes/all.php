<?php include("logo_header.php"); ?>
<?php if(isset($_GET['empid'])){?>
<?php $empid=$_GET['empid'];?>
<div>
<?php include("emp_navigation.php"); ?>
</div>
<?php
$str="SELECT * FROM employer WHERE emp_ID='$empid'";
 $emp=$db->query($str);
$emp_f=$db->getrow($emp);
if($emp_f){
	$path=$emp_f['url'];
 ?>
 <div>
<?php include("emp_div_row.php"); ?>
<center><h4 class="well">Employee Database Records:</h4></center>
<table id="emps_all" class="table">
  <thead>
<tr>
<th>&nbsp;</th><th class="well">Employee:</th><th class="well">Company:</th><th class="well">Criminal Record:</th><th class="well">Employment Status:</th>
</th>
</tr>
	</thead>
  <tbody></tbody>
  <script type="text/javascript">
  var stack_stuff=[];
  <?php
  $f=$db->query("SELECT * FROM employee INNER JOIN company ON employee.empl_company=company.company_ID");
  $i=1;
  while($get=$db->getrow($f)) { ?>
  		stack_stuff.push({
  				'#':"<?php echo $i; ?>",
  				'employee':"<a href=<?php echo "view_all.php?empid={$empid}&empl={$get['empl_ID']}"; ?> ><?php echo "{$get['empl_fname']}  {$get['empl_lname']}"; ?></a>",
  				'company':"<?php echo $get['company_name']; ?>",
  				'criminal_record':"<?php echo $get['empl_criminalrecord']; 	?>",
  				'status':"<?php echo $get['emp_status']; ?>"
  			});
   <?php $i++; } ?>
  </script>
  <script type="text/javascript">

  $(document).ready( function(){
  	console.log(stack_stuff);
      $('#emps_all').DataTable({
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
</table>
<?php } } ?>
