<h2><?= $title ?></h2>

<a class="btn btn-info" href="<?php echo site_url('/posts/create'); ?>">Create</a>

<table class="table table-hover">
	<thead>
		<tr>
			<th>Title</th>
			<th>Posted on</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($posts as $post) : ?>
		<tr>
			<td><?php echo $post['title']; ?></td>
			<td><?php echo $post['created_at']; ?></td>
			<td>
				<a class="btn btn-success pull-left" href="<?php echo site_url('/posts/view/'.$post['slug']); ?>">Read More</a> 
				<a class="btn btn-warning pull-left" href="<?php echo site_url('/posts/edit/'.$post['slug']); ?>">Edit</a>
				<?php echo form_open('/posts/delete/'.$post['id']); ?>
					<input type="submit" value="Delete" class="btn btn-danger">
				</form>
			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>