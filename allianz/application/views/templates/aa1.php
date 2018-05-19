<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Demo Replicant Web</title>
	    <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
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
		      		<li><a href="
		      			<?php 
		      				$slug1  = $this->uri->segment(1); 
		      				$slug2  = $this->uri->segment(2); 
		      				if($slug2 == "contact" AND $slug1 == "") {
								$pages = base_url();

							}else{
								$pages = base_url().$slug2;
							}
							echo $pages;
		      			?>
		      		">Home</a></li>
		      		<li><a href="
		      			<?php 
		      				$slug1  = $this->uri->segment(1); 
		      				$slug2  = $this->uri->segment(2); 
		      				if($slug2 == "contact" AND $slug1 == "" or $slug1 == "signup" or $slug1 == "forgot") {
								$pages = base_url()."contact";

							}elseif($slug1 == "contact" AND $slug2 != "") {
								$pages = base_url()."contact/".$slug2;

							}else{
								$pages = base_url()."contact/".$slug1;
							}
							echo $pages;
		      			?>
		      		">Contact</a></li>
		      	</ul>
		    	<ul class="nav navbar-nav navbar-right">
		      		<li><p class="navbar-text">Already have an account?</p></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> Login</b> <span class="caret"></span></a>
						<ul id="login-dp" class="dropdown-menu">
							<li>
								 <div class="row">
										<div class="col-md-12">
											<?php echo form_open('agents/sign_in'); ?>
											
											 		<div class="form-group">
														 <label class="sr-only">Username</label>
														 <input type="text" class="form-control"  placeholder="Username" name="username" required>
													</div>
													<div class="form-group">
														 <label class="sr-only">Password</label>
														 <input type="password" class="form-control"  placeholder="Password" name="password" required>
			                                             <div class="help-block text-right"><a href="<?php echo base_url(); ?>forgot">Forget the password ?</a></div>
													</div>
													<div class="form-group">
														 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
													</div>
											 </form>
										</div>
										<div class="bottom text-center">
											New here ? <a href="<?php echo base_url(); ?>signup"><b>Join Us</b></a>
										</div>
								 </div>
							</li>
						</ul>
			        </li>
		    	</ul>
		  	</div>
		</nav>

		<div class="container">
