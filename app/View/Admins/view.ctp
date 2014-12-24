<div class="admins view">
<h2><?php  __('Admin');?></h2>
	<?php $i = 0; $class = ' | ';?>
		<?php if ($i % 2 == 0) echo $class;?><?php __('Id'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $admin['Admin']['id']; ?>
			&nbsp;
		<?php if ($i % 2 == 0) echo $class;?><?php __('Username'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $admin['Admin']['username']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Password'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $admin['Admin']['password']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Priviledge'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $admin['Admin']['priviledge']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Is Activated'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $admin['Admin']['is_activated']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Token'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $admin['Admin']['token']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Created At'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $admin['Admin']['created_at']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Updated At'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $admin['Admin']['updated_at']; ?>
			&nbsp;
		
	
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Admin'), array('action' => 'edit', $admin['Admin']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Admin'), array('action' => 'delete', $admin['Admin']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $admin['Admin']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Admins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Admin'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Threads');?></h3>
	<?php if (!empty($admin['Thread'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Admin Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Is Publish'); ?></th>
		<th><?php __('Created At'); ?></th>
		<th><?php __('Updated At'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($admin['Thread'] as $thread):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $thread['id'];?></td>
			<td><?php echo $thread['admin_id'];?></td>
			<td><?php echo $thread['title'];?></td>
			<td><?php echo $thread['content'];?></td>
			<td><?php echo $thread['is_publish'];?></td>
			<td><?php echo $thread['created_at'];?></td>
			<td><?php echo $thread['updated_at'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'threads', 'action' => 'view', $thread['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'threads', 'action' => 'edit', $thread['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'threads', 'action' => 'delete', $thread['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $thread['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
