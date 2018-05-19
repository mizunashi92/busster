<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Demo Replicant Web</title>
	    <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  		<script src="http://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
  		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		  	<div class="container-fluid">
		    	<div class="navbar-header">
		      		<a class="navbar-brand" href="<?php echo base_url(); ?>">Replicant Web</a>
		    	</div>
		    	<ul class="nav navbar-nav">
		      		<li><a href="<?php echo base_url(); ?>member">Manage Profile</a></li>
		      		<li><a href="<?php echo base_url(); ?>password">Change Password</a></li>
		      		<li><a href="<?php echo base_url(); ?>mypage">Business</a></li>
		      		<li><a href="<?php echo base_url(); ?>products">Products</a></li>
		      		<?php
		      		if($_SESSION['id'] == 1) {
			      		echo "
			      		<li><a href=".base_url()."users>User Verification</a></li>
			      		<li><a href=".base_url()."posts>Manage Articles</a></li>
						<li><a href=".base_url()."videos>Manage Video</a></li>
						<li><a href=".base_url()."hit>Hit Counter</a></li>
						";
					}?>
		      	</ul>
		    	<ul class="nav navbar-nav navbar-right">
		      		<li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
		      	</ul>
		  	</div>
		</nav>

		<div class="container">
