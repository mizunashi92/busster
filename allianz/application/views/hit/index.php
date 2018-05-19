<h2><?= $title; ?></h2>
    <table class="table table-hover">
		<thead>
			<tr>
				<th>Profile</th>
				<th>Today</th>
				<th>Yesterday</th>
				<th>This Week</th>
				<th>This Month</th>
				<th>Total Hits</th>
			</tr>
		</thead>
		<tbody>
    	<?php foreach ($hits as $hit) : ?>
    	<tr>	
    		<td><?php echo $hit['slug']; ?></td>
    		<td><?php echo $hit['TodayHits']; ?></td>
    		<td><?php echo $hit['YesterdayHits']; ?></td>
    		<td><?php echo $hit['WeekHits']; ?></td>
    		<td><?php echo $hit['MonthHits']; ?></td>
    		<td><?php echo $hit['TotalHits']; ?></td>
    	
    	</tr>
    	<?php endforeach; ?>
	</tbody>
</table>