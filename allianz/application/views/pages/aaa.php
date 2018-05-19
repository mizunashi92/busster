<h2> <?= $title ?> </h2>

<h3> <?= $title_post ?> </h3>
<?php foreach($posts as $post) : ?>
	<h5><a href="<?php echo site_url('/articles/'.$post['slug']); ?>"><?php echo $post['title']; ?></a></h5>
	<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>
	<?php echo $post['body']; ?>
	<small class="post-by"><?php echo $post['created_by']; ?></small>
<?php endforeach; ?>

<h3><?php echo $video['title']; ?></h3>
<?php echo $video['url']; ?>