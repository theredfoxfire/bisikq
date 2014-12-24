<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>BISIKQ</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php
			echo $this->Html->meta('icon');
			echo $this->Html->css(array('bootstrap.min', 'bootstrap.min-login', 'fontawesome/css/font-awesome.min','styles', 'styles-login'));
			
		?>
		<style>
		</style>
		<?php
			if($isAuth == 1){
			echo $this->Html->script(array('tinymce/tinymce.min','bootstrap.min','scripts'));
			}
		?>
		<script type="text/javascript">
		tinymce.init({
			selector: "textarea"
		 });
		</script>
	</head>
<body>
			<?php 
			echo $this->Session->flash(); ?>
			<?php  
				if($isAuth == 2){
			?>
		<div id="wrap">
		<header>
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<a class="logo navbar-brand" rel="home" href="/projects/bisikq/categories/index/">LOGO BISIKQ</a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse">
						<div class="col-sm-3 col-md-3 pull-right">
						  <form class="navbar-form" role="search" action="/projects/bisikq/threads/search" method="get">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Thread Search" name="search" id="srch-term">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						  </form>
						</div>
						<ul class="nav navbar-nav">
							<li>
								<?php
									echo $this->Html->link('COMPANY PROFILES', array('controller' => 'companyprofiles', 'action' => 'view', 1));
								?>
							</li>
							<li>
								<?php
								echo $this->Html->link('GENERAL RULES', array('controller' => 'generalrules', 'action' => 'view', 1));
								?>
							</li>
							<li class="nav-last">
								<?php
								echo $this->Html->link('CONTACT US', array('controller' => 'contacts', 'action' => 'add'));
								?>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
			<?php
				} elseif($isAuth == 1){
			?>
				
			<?php
				}
			?>
			<?php echo $this->fetch('content'); ?>
			
			<?php if($isAuth == 2) {
			?>
				<footer>
			<div class="container">
				<div class="footer-left col-sm-6">
					<!--<ul class="second-menu">
						<li><a href="">Home</a></li>
						<li><a href="">General Rules</a></li>
						<li><a href="">Company Profile</a></li>
						<li><a href="">Contact Us</a></li>
					</ul>-->
					<ul class="second-menu">
							<li>
								<?php
									echo $this->Html->link('Home', array('controller' => 'categories', 'action' => 'index'));
								?>
							</li>
							<li>
								<?php
									echo $this->Html->link('Company Profiles', array('controller' => 'companyprofiles', 'action' => 'view', 1));
								?>
							</li>
							<li>
								<?php
								echo $this->Html->link('General Rules', array('controller' => 'generalrules', 'action' => 'view', 1));
								?>
							</li>
							<li class="nav-last">
								<?php
								echo $this->Html->link('Contact Us', array('controller' => 'contacts', 'action' => 'add'));
								?>
							</li>
						</ul>
					Copyright ⓒ 2014 BISIKQ. All Rights Reserved
				</div>
				<div class="footer-right col-sm-6">
					<ul class="sosmed">
						<li><a href=""><?php echo $this->Html->image('sosial/fb.png'); ?></a></li>
						<li><a href=""><?php echo $this->Html->image('sosial/google-plus.png'); ?></li>
						<li><a href=""><?php echo $this->Html->image('sosial/linkedin.png'); ?></a></li>
						<li><a href=""><?php echo $this->Html->image('sosial/pinterest.png'); ?></a></li>
						<li><a href=""><?php echo $this->Html->image('sosial/twitter.png'); ?></a></li>
						<li><a href=""><?php echo $this->Html->image('sosial/dribel.png'); ?></a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
			<?php
			}
			?>
</body>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<?php
		if($isAuth){
			echo $this->Html->script(array('tinymce/tinymce.min','bootstrap.min','scripts'));
		}
		?>
</html>
