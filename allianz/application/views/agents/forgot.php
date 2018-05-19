<h2><?= $title; ?> </h2>
<?php echo validation_errors(); ?>

<?php echo form_open('agents/validation_forgot'); ?>
    <div class="form-group col-lg-6">
      <label>Email Address</label>
      <input type="email" class="form-control" placeholder="Enter your email address" name="email" required>
    </div>
    <div class="form-group col-lg-12">
    <button type="submit" class="btn btn-default">Submit</button>
	</div>
</form>