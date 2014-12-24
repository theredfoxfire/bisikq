<div class="threadreports view">
<h2><?php  __('Threadreport');?></h2>
	<?php $i = 0; $class = ' class="altrow"';?>
		<?php if ($i % 2 == 0) echo $class;?><?php __('Id'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $threadreport['Threadreport']['id']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Thread'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $this->Html->link($threadreport['Thread']['title'], array('controller' => 'threads', 'action' => 'view', $threadreport['Thread']['id'])); ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Is Confirm'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $threadreport['Threadreport']['is_confirm']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Created At'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $threadreport['Threadreport']['created_at']; ?>
			&nbsp;
		
	
</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Threadreport'), array('action' => 'edit', $threadreport['Threadreport']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Threadreport'), array('action' => 'delete', $threadreport['Threadreport']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $threadreport['Threadreport']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Threadreports'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Threadreport'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
