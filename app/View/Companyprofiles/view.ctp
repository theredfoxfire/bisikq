<?php
	if(($isAuth == 1) AND ($is_admin)){
?>	
<?php
	} else {
?>	
	
		<div class="main-head">
			<div class="container">
				<div class="subheader col-sm-12">
					<h3>Profile Perusahaan</h3>
				</div>
			</div>
		</div>
		<div class="main-content">
			<div class="container">
				<div class="static-page box-list col-sm-12">
					<?php echo $this->Html->image('profile.jpg'); ?>
					<div class="static-content">
						<p>
							<?php echo $companyprofile['Companyprofile']['profile']; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		
<?php	
	}
?>
