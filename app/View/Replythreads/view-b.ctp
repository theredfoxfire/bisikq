<div class="replythreads view">
<h2><?php  __('Replythread');?></h2>
	<?php $i = 0; $class = ' | ';?>
		<?php if ($i % 2 == 0) echo $class;?><?php __('Id'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $replythread['Replythread']['id']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Thread'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $this->Html->link($replythread['Thread']['title'], array('controller' => 'threads', 'action' => 'view', $replythread['Thread']['id'])); ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Replyer'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $replythread['Replythread']['replyer']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Text'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $replythread['Replythread']['text']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Is Publish'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $replythread['Replythread']['is_publish']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Created At'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $replythread['Replythread']['created_at']; ?>
			&nbsp;
</div>

<div class="related">
	<h3><?php __('Related Threadreports');?></h3>
	<?php if (!empty($replythread['Threadreport'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Thread Id'); ?></th>
		<th><?php __('Is Confirm'); ?></th>
		<th><?php __('Created At'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($replythread['Threadreport'] as $threadreport):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $threadreport['id'];?></td>
			<td><?php echo $this->Html->link($threadreport['replythread_id'], array('controller' => 'replythreads', 'action' => 'view', $threadreport['replythread_id'])); ?></td>
			<td><?php echo $threadreport['is_confirm'];?></td>
			<td><?php echo $threadreport['created_at'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'threadreports', 'action' => 'view', $threadreport['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'threadreports', 'action' => 'edit', $threadreport['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'threadreports', 'action' => 'delete', $threadreport['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $threadreport['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Thread Report'), array('controller' => 'threadreports', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Replythread'), array('action' => 'edit', $replythread['Replythread']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Report'), array('controller' => 'threadreports', 'action' => 'add', $replythread['Replythread']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Replythread'), array('action' => 'delete', $replythread['Replythread']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $replythread['Replythread']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Replythreads'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replythread'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
