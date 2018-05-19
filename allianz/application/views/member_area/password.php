<h2><?= $title; ?></h2>
<div class="row">
	<div class="col-lg-6">
		<?php echo validation_errors(); ?>

		<?php echo form_open('members/update_password'); ?>
			<div class="form-group">
		      <label>Old Password</label>
		      <input type="password" class="form-control" placeholder="Enter old password" name="old" required>
		    </div>
		    <div class="form-group">
		      <label>New Password</label>
		      <input type="password" class="form-control" placeholder="Enter new password" name="password" required>
		    </div>
		    <div class="form-group">
		      <label>Retype New Password</label>
		      <input type="password" class="form-control" placeholder="Retype new password" name="repass" required>
		    </div>
		    <div class="form-group">
		    <button type="submit" class="btn btn-default">Submit</button>
			</div>
		</form>
	</div>	
</div>