<div class="companyprofiles index">
	<h2><?php __('Companyprofiles');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('profile');?></th>
			<th><?php echo $this->Paginator->sort('is_publish');?></th>
			<th><?php echo $this->Paginator->sort('created_at');?></th>
			<th><?php echo $this->Paginator->sort('updated_at');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($companyprofiles as $companyprofile):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $companyprofile['Companyprofile']['id']; ?>&nbsp;</td>
		<td><?php echo $companyprofile['Companyprofile']['title']; ?>&nbsp;</td>
		<td><?php echo $companyprofile['Companyprofile']['profile']; ?>&nbsp;</td>
		<td><?php echo $companyprofile['Companyprofile']['is_publish']; ?>&nbsp;</td>
		<td><?php echo $companyprofile['Companyprofile']['created_at']; ?>&nbsp;</td>
		<td><?php echo $companyprofile['Companyprofile']['updated_at']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $companyprofile['Companyprofile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $companyprofile['Companyprofile']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $companyprofile['Companyprofile']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $companyprofile['Companyprofile']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Companyprofile'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?></li>
	</ul>
</div>
