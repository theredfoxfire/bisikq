<div class="threadreports form">
<?php echo $this->Form->create('Threadreport');?>
	<fieldset>
		<legend><?php __('Add Threadreport'); ?></legend>
	<?php
		echo $this->Form->input('thread_id');
		echo $this->Form->input('is_confirm');
		echo $this->Form->input('created_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Threadreports'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
