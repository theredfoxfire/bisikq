<div class="threadreports index">
	<h2><?php __('Threadreports');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('replythread_id');?></th>
			<th><?php echo $this->Paginator->sort('is_confirm');?></th>
			<th><?php echo $this->Paginator->sort('created_at');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($threadreports as $threadreport):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $threadreport['Threadreport']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link('View the Reply', array('controller' => 'replythreads', 'action' => 'view', $threadreport['Replythread']['id'])); ?>
		</td>
		<td><?php echo $threadreport['Threadreport']['is_confirm']; ?>&nbsp;</td>
		<td><?php echo $threadreport['Threadreport']['created_at']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $threadreport['Threadreport']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $threadreport['Threadreport']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $threadreport['Threadreport']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $threadreport['Threadreport']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Threadreport'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
