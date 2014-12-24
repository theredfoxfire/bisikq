<div class="threads index">
	<h2><?php __('Threads');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('admin_id','Created By');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			
	</tr>
	<?php
	$i = 0;
	foreach ($threads as $thread):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $thread['Thread']['id']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($thread['Admin']['username'], array('controller' => 'admins', 'action' => 'view', $thread['Admin']['id'])); ?>&nbsp;</td>
		<td><?php echo $thread['Thread']['title']; ?>&nbsp;</td>
		<td><?php echo $thread['Thread']['content']; ?>&nbsp;</td>
	</tr>
	<?php if($isAuth == 1){ ?>
	<tr><td colspan="4" class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $thread['Thread']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $thread['Thread']['id'])); ?>
			<?php echo $this->Html->link(__('Comment'), array('controller' => 'replythreads', 'action' => 'add', $thread['Thread']['id'])); ?>
			<?php echo $this->Html->link(__('Rate'), array('controller' => 'threadrates', 'action' => 'add', $thread['Thread']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $thread['Thread']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $thread['Thread']['id'])); ?>
		</td></tr><?php } else { ?>
			<tr><td colspan="4" class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $thread['Thread']['id'])); ?>
			<?php echo $this->Html->link(__('Comment'), array('controller' => 'replythreads', 'action' => 'add', $thread['Thread']['id'])); ?>
			<?php echo $this->Html->link(__('Rate'), array('controller' => 'threadrates', 'action' => 'add', $thread['Thread']['id'])); ?>
		</td></tr>
	<?php } ?>
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
		<li><?php echo $this->Html->link(__('New Thread'), array('action' => 'add')); ?></li>
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
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Company Profiles'), array('controller' => 'companyprofiles', 'action' => 'view', 1)); ?> </li>
		<li><?php echo $this->Html->link(__('General rules'), array('controller' => 'generalrules', 'action' => 'view', 1)); ?></li>
		<li><?php echo $this->Html->link(__('Contacts Us'), array('controller' => 'contacts', 'action' => 'add')); ?></li>
		<?php } ?>
	</ul>
</div>
