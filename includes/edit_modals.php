<div id="myModal_lname" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Last Name</h4>
			</div>
				<div class="modal-body">
<?php $field_12='last'; ?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_12}"; ?> method="POST" class='form-horizontal'>
  <div class="form-group">
  <input type="text" name="new_val" placeholder="Edit Last Name" class="form-control"/>
  <input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
  </div>
</form>
				</div>
    </div>
  </div>
</div>
<div id="myModal_contact" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Contact</h4>
			</div>
				<div class="modal-body">
<?php $field_11='contact'; ?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_11}"; ?> method="POST" class='form-horizontal'>
  <div class="form-group">
  <input type="text" name="new_val" placeholder="Edit Contact" class="form-control"/>
  <input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
  </div>
</form>
				</div>
    </div>
  </div>
</div>
<div id="myModal_email" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Email Address</h4>
			</div>
				<div class="modal-body">
<?php $field_10='email'; ?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_10}"; ?> method="POST" class='form-horizontal'>
  <div class="form-group">
  <input type="text" name="new_val" placeholder="Edit Email address" class="form-control"/>
  <input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
  </div>
</form>
				</div>
    </div>
  </div>
</div>
<div id="myModal_position" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Current Position</h4>
			</div>
				<div class="modal-body">
<?php $field_8='position'; ?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_8}"; ?> method="POST" class='form-horizontal'>
  <div class="form-group">
  <input type="text" name="new_val" placeholder="Edit Current Position" class="form-control"/>
  <input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
  </div>
</form>
				</div>
    </div>
  </div>
</div>
<div id="myModal_record" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Criminal Record</h4>
			</div>
				<div class="modal-body">
<?php $field_7='record'; ?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_7}"; ?> method="POST" class='form-horizontal'>
  <div class="form-group">
  <input type="text" name="new_val" placeholder="Edit Criminal Record" class="form-control"/>
  <input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
  </div>
</form>
				</div>
    </div>
  </div>
</div>
<div id="myModal_recommedation" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Recommendation</h4>
			</div>
				<div class="modal-body">
<?php $field_6='recommend'; ?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_6}"; ?> method="POST" class='form-horizontal'>
  <div class="form-group">
  <input type="text" name="new_val" placeholder="Edit Recommendation" class="form-control"/>
  <input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
  </div>
</form>
				</div>
    </div>
  </div>
</div>
<div id="myModal_fatherNames" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Father Names</h4>
			</div>
				<div class="modal-body">
<?php $field_5='father_names'; ?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_5}"; ?> method="POST" class='form-horizontal'>
  <div class="form-group">
  <input type="text" name="new_val" placeholder="Edit Father Names" class="form-control"/>
  <input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
  </div>
</form>
				</div>
    </div>
  </div>
</div>
<div id="myModal_motherNames" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Mother Names</h4>
			</div>
				<div class="modal-body">
<?php $field_4='mother_names'; ?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_4}"; ?> method="POST" class='form-horizontal'>
  <div class="form-group">
  <input type="text" name="new_val" placeholder="Edit Mother Names" class="form-control"/>
  <input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
  </div>
</form>
				</div>
    </div>
  </div>
</div>
<div id="myModal_fatherDOB" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Father D.O.B </h4>
			</div>
				<div class="modal-body">
<?php $field_3='father_dob'; ?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_3}"; ?> method="POST" class='form-horizontal'>
  <div class="form-group">
  <input type="date" name="new_val" placeholder="Edit Father D.O.B" class="form-control"/>
  <input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
  </div>
</form>
				</div>
    </div>
  </div>
</div>
<div id="myModal_fatherAddr" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Father Address</h4>
			</div>
				<div class="modal-body">
<?php $field_2='father_addr'; ?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_2}"; ?> method="POST" class='form-horizontal'>
  <div class="form-group">
  <input type="text" name="new_val" placeholder="Edit Father Address" class="form-control"/>
  <input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
  </div>
</form>
				</div>
    </div>
  </div>
</div>
<div id="myModal_formerEmployer" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Former Employer</h4>
			</div>
				<div class="modal-body">
					<?php
$field_1='former';
					?>
<form action=<?php echo "view.php?empid=$empid&empl={$employee}&field={$field_1}"; ?> method="POST" class='form-horizontal'>
  <div class="form-group">
  <input type="text" name="new_val" placeholder="Edit Former Employer" class="form-control"/>
  <input type="submit" name="edit" value="Edit"  class="btn btn-default form-control"/>
  </div>
</form>
				</div>
    </div>
  </div>
</div>
