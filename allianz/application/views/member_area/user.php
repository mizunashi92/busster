<h2><?= $title; ?></h2>

<div class="col-lg-6">
		<table class="table table-hover">
			<tr>
				<td align="center" colspan="3">
				<img src="<?php echo base_url(); ?>assets/agents/<?php echo $agent['image'] ?>" alt="Img" height="120" width="120" />
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