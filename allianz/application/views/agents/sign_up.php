<h2><?= $title; ?> </h2>
<?php echo validation_errors(); ?>

<?php echo form_open('agents/validation_signup'); ?>
	<div class="form-group col-lg-6">
      <label>Username</label>
      <input type="text" class="form-control" placeholder="Enter username" name="username" required>
    </div>
    <div class="form-group col-lg-6">
      <label>Full Name</label>
      <input type="text" class="form-control" placeholder="Enter full name" name="name" required>
    </div>
    <div class="form-group col-lg-6">
      <label>Password</label>
      <input type="password" class="form-control" placeholder="Enter password" name="password" required>
    </div>
    <div class="form-group col-lg-6">
      <label>Retype Password</label>
      <input type="password" class="form-control" placeholder="Retype password" name="repass" required>
    </div>
    <div class="form-group col-lg-6">
      <label>Polis Number</label>
      <input type="text" class="form-control" placeholder="Enter polis number" name="polis_no" required>
    </div>
    <div class="form-group col-lg-6">
      <label>Email Address</label>
      <input type="email" class="form-control" placeholder="Enter email address" name="email" required>
    </div>
    <div class="form-group col-lg-6">
      <label>Telephone Number</label>
      <input type="text" class="form-control" placeholder="Enter telephone number" name="phone" required>
    </div>
    <div class="form-group col-lg-12">
    <button type="submit" class="btn btn-default">Submit</button>
	</div>
</form>