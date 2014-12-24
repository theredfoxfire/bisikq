<div class="categories index">
	<h2><?php __('Categories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<?php if($isAuth == 1) {?>
			<th><?php echo $this->Paginator->sort('is_publish');?></th>
			<th class="actions"><?php __('Actions');?></th>
			<?php } ?>
	</tr>
	<?php
	$i = 0;
	foreach ($categories as $category):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $category['Category']['id']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($category['Category']['name'], array('action' => 'view', $category['Category']['id'])); ?></td>
		<?php if($isAuth == 1) {?>
		<td><?php echo $category['Category']['is_publish']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $category['Category']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $category['Category']['id'])); ?>
		</td>
		<?php } ?>
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
	<?php if($isAuth == 1) {?>
		<li><?php echo $this->Html->link(__('List Thread'), array('controller' => 'threads', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Replythreads'), array('controller' => 'replythreads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Admins'), array('controller' => 'admins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Admins'), array('controller' => 'admins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Company Profiles'), array('controller' => 'companyprofiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company Profiles'), array('controller' => 'companyprofiles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New Replythread'), array('controller' => 'replythreads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Generalrules'), array('controller' => 'generalrules', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Thread reports'), array('controller' => 'threadreports', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Threadrates'), array('controller' => 'threadrates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Threadrate'), array('controller' => 'threadrates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<?php } else { ?>
		<li><?php echo $this->Html->link(__('List Thread'), array('controller' => 'threads', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Company Profiles'), array('controller' => 'companyprofiles', 'action' => 'view', 1)); ?> </li>
		<li><?php echo $this->Html->link(__('General rules'), array('controller' => 'generalrules', 'action' => 'view', 1)); ?></li>
		<li><?php echo $this->Html->link(__('Contacts Us'), array('controller' => 'contacts', 'action' => 'add')); ?></li>
		<?php } ?>
	</ul>
</div>
