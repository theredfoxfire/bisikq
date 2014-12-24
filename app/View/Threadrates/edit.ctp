<div class="threadrates form">
<?php echo $this->Form->create('Threadrate');?>
	<fieldset>
		<legend><?php __('Edit Threadrate'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('thread_id');
		echo $this->Form->input('rates');
		echo $this->Form->input('created_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Threadrate.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Threadrate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Threadrates'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
