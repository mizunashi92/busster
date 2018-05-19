<h2> <?= $title ?> </h2>

<h3> <?= $title_post ?> </h3>
<?php foreach($posts as $post) : ?>
	<h5><a href="<?php echo site_url('/posts/view/'.$post['slug']); ?>"><?php echo $post['title']; ?></a></h5>
	<?php if($post['image'] != null){ ?>
			 <img src="<?php echo site_url(); ?>assets/posts/<?php echo $post['image']; ?>">
			<?php } ?>
	<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>
	<?php echo word_limiter($post['body'],60); ?>
	<small class="post-by"><?php echo $post['created_by']; ?></small>
<?php endforeach; ?>
