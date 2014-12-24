<div class="categories view">
<h2><?php  __('Category');?></h2>
	<?php $i = 0; $class = ' | ';?>
		<?php if ($i % 2 == 0) echo $class;?><?php __('Id'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $category['Category']['id']; ?>
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Name'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
		<?php echo $category['Category']['name']; ?>
	
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
<div class="related">
	<h3><?php __('Related Threads');?></h3>
	<?php if (!empty($category['Thread'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Content'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Thread'] as $thread):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $thread['id'];?></td>
			<td><?php echo $thread['title'];?></td>
			<td><?php echo $thread['content'];?></td>
		</tr>
		<?php if($isAuth == 1){ ?>
	<tr><td colspan="3" class="actions">
			<?php echo $this->Html->link(__('View'), array('controller' => 'threads', 'action' => 'view', $thread['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('controller' => 'threads', 'action' => 'edit', $thread['id'])); ?>
			<?php echo $this->Html->link(__('Comment'), array('controller' => 'replythreads', 'action' => 'add', $thread['id'])); ?>
			<?php echo $this->Html->link(__('Rate'), array('controller' => 'threadrates', 'action' => 'add', $thread['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $thread['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $thread['id'])); ?>
		</td></tr><?php } else { ?>
			<tr><td colspan="4" class="actions">
			<?php echo $this->Html->link(__('View'), array('controller' => 'threads', 'action' => 'view', $thread['id'])); ?>
			<?php echo $this->Html->link(__('Comment'), array('controller' => 'replythreads', 'action' => 'add', $thread['id'])); ?>
			<?php echo $this->Html->link(__('Rate'), array('controller' => 'threadrates', 'action' => 'add', $thread['id'])); ?>
		</td></tr>
	<?php } ?>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	<?php if($isAuth == 1){ ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add'));?> </li>
		</ul>
	</div>
	<?php } ?>
</div>
