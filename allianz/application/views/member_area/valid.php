<h2><?= $title; ?></h2>

<table class="table table-hover">
	<thead>
		<tr>
			<th>Polis Number</th>
			<th>Full Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($users as $user) : ?>
		<tr>
			<td><?php echo $user['polis_no']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td>
				<a class="btn btn-info pull-left" href="<?php echo site_url('/admin/view/'.$user['id']); ?>">View Profile</a>  
				<?php echo form_open('/admin/accept/'.$user['username']); ?>
					<input type="submit" value="Accept" class="btn btn-success pull-left">
				</form>
				<?php echo form_open('/admin/reject/'.$user['id']); ?>
					<input type="submit" value="Reject" class="btn btn-danger">
				</form>
			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>