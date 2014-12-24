<div class="generalrules form">
<?php echo $this->Form->create('Generalrule');?>
	<fieldset>
		<legend><?php __('Edit Generalrule'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('rules');
		echo $this->Form->input('is_publish');
		echo $this->Form->input('created_at');
		echo $this->Form->input('updated_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Generalrule.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Generalrule.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Generalrules'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?></li>
	</ul>
</div>
