<div class="users form">
<?php
	echo $this->Session->flash('auth');
	echo $this->Form->create('Admin');
?>
	<fieldset>
		<legend>
			<?php echo __('Silahkan masukan username dan password!');?>
		</legend>
		<?php 
			echo $this->Form->input('username'); 
			echo $this->Form->input('password');
		?>
	</fieldset>
	<?php
		echo $this->Form->end(__('Login'));
	?>
</div>
