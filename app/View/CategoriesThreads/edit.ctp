<div class="categoriesThreads form">
<?php echo $this->Form->create('CategoriesThread');?>
	<fieldset>
		<legend><?php __('Edit Categories Thread'); ?></legend>
	<?php
		echo $this->Form->input('category_id');
		echo $this->Form->input('thread_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('CategoriesThread.category_id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('CategoriesThread.category_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categories Threads'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
