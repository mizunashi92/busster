<h2><?= $title; ?></h2>
<div class="row">
	<div class="col-lg-12">
	<ul class="nav nav-pills">
	    <li class="active"><a data-toggle="tab" href="#biodata">Bio Data</a></li>
	    <li><a data-toggle="pill" href="#personal">Personal Articles</a></li>
	</ul>
	</div>
	<div class="tab-content">
		<div id="biodata" class="tab-pane fade in active">
			<div class="col-lg-6">
				<?php echo validation_errors(); ?>

				<?php echo form_open_multipart('members/update_profile'); ?>
					<div class="form-group">
				      <label>Full Name</label>
				      <input type="text" class="form-control" placeholder="Enter full name" name="name" value="<?php echo $agent['name']; ?>" required>
				    </div>
				    <div class="form-group">
				      <label>Polis Number</label>
				      <input type="text" class="form-control" placeholder="Enter polis number" name="polis_no" value="<?php echo $agent['polis_no']; ?>" required>
				    </div>
				    <div class="form-group">
				      <label>Email Address</label>
				      <input type="email" class="form-control" placeholder="Enter email address" name="email" value="<?php echo $agent['email']; ?>" required>
				    </div>
				    <div class="form-group">
				      <label>Telephone Number</label>
				      <input type="text" class="form-control" placeholder="Enter telephone number" name="phone" value="<?php echo $agent['phone']; ?>" required>
				    </div>
				    <div class="form-group">
					<label>Image</label>
					    <input type="hidden" name="image" value="<?= $agent['image'];?>">
					    <input type="file" name="userfile"  size="20" />
					  </div>
				    <div class="form-group">
				    <button type="submit" class="btn btn-default">Submit</button>
					</div>
				</form>
			</div>
			<div class="col-lg-6">
				<table class="table table-hover">
					<tr>
						<td align="center" colspan="3">
						<?php if($agent['image'] != null){ ?>
						<img src="<?php echo base_url(); ?>assets/agents/<?php echo $agent['image'] ?>" alt="Img" height="120" width="120" />
						<?php }else{ ?>
						<img src="<?php echo base_url(); ?>assets/agents/blank.jpg" alt="Img" height="120" width="120" />
						<?php } ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td>:</td>
						<td><?php echo $agent['name'] ?></td>
					</tr>
					<tr>
						<th>Polis No</th>
						<td>:</td>
						<td><?php echo $agent['polis_no'] ?></td>
					</tr>
					<tr>
						<th>Telephone</th>
						<td>:</td>
						<td><?php echo $agent['phone'] ?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td>:</td>
						<td><?php echo $agent['email'] ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div id="personal" class="tab-pane fade">
			<?php echo validation_errors(); ?>
			
			<?php foreach($personal as $data) : ?>
				<div class="col-lg-6">
				<?php echo form_open_multipart('members/update_personal'); ?>
					<input type="hidden" name="id" value=" <?php echo $data['id']; ?>">
				  <div class="form-group">
				    <label>Title</label>
				    <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $data['title']; ?>" required>
				  </div>
				  <div class="form-group">
				    <label>Body</label>
				    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body" required><?php echo $data['body']; ?></textarea>
				  </div>
				  <div class="form-group">
				    <label>Image</label>
				    <input type="hidden" name="image" value="<?php echo $data['image'];?>">
				    <input type="file" name="userfile"  size="20" />
				  </div>
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>