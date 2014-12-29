<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo (!$is_admin) ? "Selamat datang di BISIKQ" : "Managing BISIKQ" ; ?></title>
		<meta name="keywords" content="bisikq, apartmen, komplek, area, ">
		<meta name="description" content="Selamat datang di BISIKQ, ">
		<meta http-equiv="Copyright" content="BISIKQ">
		<meta name="author" content="BISIKQ">
		<meta name="language" content="Ind">
		<meta name="webcrawlers" content="all">
		<meta name="rating" content="general">
		<meta name="spiders" content="all">
		<meta name="robots" content="index, follow">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<?php
			echo $this->Html->meta('icon');
			if(($isAuth == 2) OR (!$is_admin)){
			
				echo $this->Html->css(array('bootstrap.min','fontawesome/css/font-awesome.min','styles'));
			}else {
			
				echo $this->Html->css(array('bootstrap.min-login', 'fontawesome/css/font-awesome.min', 'styles-login'));
			}
		?>
		<?php
			if($isAuth != 2){
				echo $this->Html->script(array('tinymce/tinymce.min'));
			
			}
			
			if(($isAuth == 1) and ($is_admin)){
						?>
		<script type="text/javascript">
		tinymce.init({
			selector: "textarea"
		 });
		</script>
		<?php
			}
		?>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.min.js"></script>
	</head>
<body>
			<?php  
				if(($isAuth == 2) OR (!$is_admin)){
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
								<input type="text" class="form-control" placeholder="Cari Thread" name="search" id="srch-term">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						  </form>
						</div>
						<ul class="nav navbar-nav">
							<li>
								<?php
									echo $this->Html->link('PROFILE PERUSAHAAN', array('controller' => 'companyprofiles', 'action' => 'view', 1));
								?>
							</li>
							<li>
								<?php
								echo $this->Html->link('PERATURAN UMUM', array('controller' => 'generalrules', 'action' => 'view', 1));
								?>
							</li>
							<li class="nav-last">
								<?php
								echo $this->Html->link('HUBUNGI KAMI', array('controller' => 'contacts', 'action' => 'add'));
								?>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<form class="mobile-search navbar-form" role="search" action="/projects/bisikq/threads/search" method="get">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Cari Thread" name="search" id="srch-term">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
			  </form>
		</header>
			<?php
				} elseif($isAuth == 1){
			?>
			<div id="wrap">
				<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
				  <div class="container-fluid">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="/projects/bisikq/admins/dashboard/">BISIKQ Administrator</a>
					</div>
					<div class="navbar-collapse collapse">
					  <ul class="nav navbar-nav navbar-right">
						
						<li> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
									<i class='glyphicon glyphicon-user'></i> Admin <span class="caret"></span>
							</a>
								<ul class="dropdown-menu" role="menu">
										<li><a href='/projects/bisikq/admins/edit/<?php echo AuthComponent::user('token');?>'><i class='glyphicon glyphicon-user'></i> Ubah Password</a></li>
										<li><a href='/projects/bisikq/admins/logout/'><i class='glyphicon glyphicon-off'></i> Logout</a></li>
								</ul></li>
						<?php if(!isset($dash)){?>
						<li class="h-menu"><?php echo $this->Html->link("<i class='glyphicon glyphicon-list-alt'></i> Thread List", array('controller'=>'threads', 'action' => 'index'), array('escape' => false)); ?></li>
						<li class="h-menu"><?php echo $this->Html->link("<i class='glyphicon glyphicon-briefcase'></i> Thread Category", array('controller'=>'categories', 'action' => 'adminindex'), array('escape' => false)); ?></li>
						<li class="h-menu"><?php echo $this->Html->link("<i class='glyphicon glyphicon-link'></i> Threads Reply", array('controller'=>'replythreads', 'action' => 'index'), array('escape' => false)); ?></li>
						<li class="h-menu"><?php echo $this->Html->link("<i class='glyphicon glyphicon-book'></i> Reported Threads Reply", array('controller'=>'threadreports', 'action' => 'index'), array('escape' => false)); ?></li>
						
					  </ul>
					  <?php } ?>
					</div>
					
				  </div><!-- /container -->
				</div>
				<!-- /Header -->
				
				<!-- Main -->
				<div class="container-fluid">
				<div class="row">
					<?php if(isset($dash)){?>
						<div class="sidebar col-sm-3">
							</div>
							<style>#wrap {background:#FFF !important}</style>
						<?php } ?>
					<?php if(!isset($dash)){?>
					<div class="sidebar col-sm-3">
					  
					 <ul class="nav nav-pills nav-stacked">
						 
						<li><?php echo $this->Html->link("<i class='glyphicon glyphicon-list-alt'></i> Threads", array('controller'=>'threads', 'action' => 'index'), array('escape' => false)); ?></li>
						<li ><?php echo $this->Html->link("<i class='glyphicon glyphicon-briefcase'></i> Thread Category", array('controller'=>'categories', 'action' => 'adminindex'), array('escape' => false)); ?></li>
						<li><?php echo $this->Html->link("<i class='glyphicon glyphicon-link'></i> Threads Reply", array('controller'=>'replythreads', 'action' => 'index'), array('escape' => false)); ?></li>
						<li><?php echo $this->Html->link("<i class='glyphicon glyphicon-book'></i> Reported Threads Reply", array('controller'=>'threadreports', 'action' => 'index'), array('escape' => false)); ?></li>
						
					  </ul> 
					  
					</div><!-- /col-3 -->
					<?php } ?>
			<?php
				}
			?>
			<?php echo $this->fetch('content'); ?>
			
			<?php
				if($is_admin){
			?>
				
				<!-- /Main -->
				</div>
			</div>
				<footer class="text-center">Copyright ⓒ 2014 BISIKQ. All Rights Reserved</footer>

				<div class="modal" id="addWidgetModal">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Add Widget</h4>
					  </div>
					  <div class="modal-body">
						<p>Add a widget stuff here..</p>
					  </div>
					  <div class="modal-footer">
						<a href="#" data-dismiss="modal" class="btn">Close</a>
						<a href="#" class="btn btn-primary">Save changes</a>
					  </div>
					</div><!-- /.modal-content -->
				  </div><!-- /.modal-dalog -->
				</div><!-- /.modal -->

				
			<?php
				}
			?>
			
			<?php if(($isAuth == 2) OR (!$is_admin)){
			?>
	</div>
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
									echo $this->Html->link('Beranda', array('controller' => 'categories', 'action' => 'index'));
								?>
							</li>
							<li>
								<?php
									echo $this->Html->link('Profile Perusahaan', array('controller' => 'companyprofiles', 'action' => 'view', 1));
								?>
							</li>
							<li>
								<?php
								echo $this->Html->link('Peraturan Umum', array('controller' => 'generalrules', 'action' => 'view', 1));
								?>
							</li>
							<li class="nav-last">
								<?php
								echo $this->Html->link('Hubungi Kami', array('controller' => 'contacts', 'action' => 'add'));
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
	
			<?php
			}
			?>
</body>
<?php
	echo $this->Html->script(array('bootstrap.min','scripts'));
?>
</html>
