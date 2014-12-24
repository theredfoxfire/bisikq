<div class="threadrates view">
<h2><?php  __('Threadrate');?></h2>
	<?php $i = 0; $class = ' | ';?>
	<?php if ($i % 2 == 0) echo $class;?><?php __('Id'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $threadrate['Threadrate']['id']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Thread'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $this->Html->link($threadrate['Thread']['title'], array('controller' => 'threads', 'action' => 'view', $threadrate['Thread']['id'])); ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Rates'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $threadrate['Threadrate']['rates']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Created At'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $threadrate['Threadrate']['created_at']; ?>
			&nbsp;
		
	
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Threadrate'), array('action' => 'edit', $threadrate['Threadrate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Threadrate'), array('action' => 'delete', $threadrate['Threadrate']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $threadrate['Threadrate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Threadrates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Threadrate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
