<div class="admins index">
	<h2><?php __('Admins');?></h2>
	<?php echo $this->Html->link(__('logout'), array('action' => 'logout')); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('priviledge');?></th>
			<th><?php echo $this->Paginator->sort('is_activated');?></th>
			<th><?php echo $this->Paginator->sort('token');?></th>
			<th><?php echo $this->Paginator->sort('created_at');?></th>
			<th><?php echo $this->Paginator->sort('updated_at');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($admins as $admin):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $admin['Admin']['id']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['username']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['password']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['priviledge']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['is_activated']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['token']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['created_at']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['updated_at']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $admin['Admin']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $admin['Admin']['token'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $admin['Admin']['token']), null, sprintf(__('Are you sure you want to delete # %s?'), $admin['Admin']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Admin'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
