<div class="threads view">
<h2><?php  __('Thread');?></h2>
	<?php $i = 0; $class = ' | ';?>
		<?php if ($i % 2 == 0) echo $class;?><?php __('Id'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $thread['Thread']['id']; ?>
			&nbsp;
		<?php if ($i % 2 == 0) echo $class;?><?php __('Admin Id'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>Oleh: <?php echo $thread['Admin']['username']; ?>
			<?php // echo $this->Html->link($thread['Admin']['username'], array('controller' => 'admins', 'action' => 'view', $thread['Admin']['id'])); ?>
			&nbsp;
		<?php if ($i % 2 == 0) echo $class;?><?php __('Title'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $thread['Thread']['title']; ?>
			&nbsp;
		<?php if ($i % 2 == 0) echo $class;?><?php __('Content'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $thread['Thread']['content']."<br />"; ?>
			&nbsp;
		<?php if($isAuth == 1){ ?>
	<table><tr><td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $thread['Thread']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $thread['Thread']['id'])); ?>
			<?php echo $this->Html->link(__('Reply'), array('controller' => 'replythreads', 'action' => 'add', $thread['Thread']['id'])); ?>
			<?php echo $this->Html->link(__('Rate'), array('controller' => 'threadrates', 'action' => 'add', $thread['Thread']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $thread['Thread']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $thread['Thread']['id'])); ?>
		</td></tr><?php } else { ?>
			<tr><td colspan="4" class="actions">
			<?php echo $this->Html->link(__('Reply'), array('controller' => 'replythreads', 'action' => 'add', $thread['Thread']['id'])); ?>
			<?php echo $this->Html->link(__('Rate'), array('controller' => 'threadrates', 'action' => 'add', $thread['Thread']['id'])); ?>
		</td></tr>
	<?php } ?></table>
		
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
	<h3>List Reply<?php __('Related Replythreads');?></h3>
	<?php if (!empty($thread['Replythread'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Thread Id'); ?></th>
		<th><?php __('Replyer'); ?></th>
		<th><?php __('Text'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($thread['Replythread'] as $replythread):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $replythread['id'];?></td>
			<td><?php echo $replythread['thread_id'];?></td>
			<td><?php echo $replythread['replyer'];?></td>
			<td><?php echo $replythread['text'];?></td>
			<td class="actions"><?php if($isAuth == 1){ ?>
				<?php echo $this->Html->link(__('View'), array('controller' => 'replythreads', 'action' => 'view', $replythread['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'replythreads', 'action' => 'edit', $replythread['id'])); ?>
				<?php echo $this->Html->link(__('Report'), array('controller' => 'threadreports', 'action' => 'add', $replythread['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'replythreads', 'action' => 'delete', $replythread['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $replythread['id'])); ?>
				<?php } else { ?>
				<?php echo $this->Html->link(__('Report'), array('controller' => 'threadreports', 'action' => 'add', $replythread['id'])); ?>
				<?php } ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	<?php if($isAuth == 1){ ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Replythread'), array('controller' => 'replythreads', 'action' => 'add'));?> </li>
		</ul>
	</div>
	<?php }?>
</div>
<div class="related">
	<h3>Rates<?php __('Related Threadrates');?></h3>
	<?php if (!empty($thread['Threadrate'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Thread Id'); ?></th>
		<th><?php __('Rates'); ?></th>
		<?php if($isAuth == 1) {?>
		<th><?php __('Created At'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
		<?php } ?>
	</tr>
	<?php
		$i = 0;
		foreach ($thread['Threadrate'] as $threadrate):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $threadrate['id'];?></td>
			<td><?php echo $threadrate['thread_id'];?></td>
			<td><?php echo $threadrate['rates'];?></td>
			<?php if($isAuth == 1) {?>
			<td><?php echo $threadrate['created_at'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'threadrates', 'action' => 'view', $threadrate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'threadrates', 'action' => 'edit', $threadrate['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'threadrates', 'action' => 'delete', $threadrate['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $threadrate['id'])); ?>
			</td>
			<?php } ?>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	<?php if($isAuth == 1) {?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Threadrate'), array('controller' => 'threadrates', 'action' => 'add'));?> </li>
		</ul>
	</div>
	<?php } ?>
	
</div>
<div class="related">
	<h3>Categories<?php __('Related Categories');?></h3>
	<?php if (!empty($thread['Category'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<?php if($isAuth == 1) {?>
		<th><?php __('Is Publish'); ?></th>
		<th><?php __('Created At'); ?></th>
		<th><?php __('Updated At'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
		<?php } ?>
	</tr>
	<?php
		$i = 0;
		foreach ($thread['Category'] as $category):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $category['id'];?></td>
			<td><?php echo $category['name'];?></td>
			<?php if($isAuth == 1) {?>
			<td><?php echo $category['is_publish'];?></td>
			<td><?php echo $category['created_at'];?></td>
			<td><?php echo $category['updated_at'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $category['id'])); ?>
			</td>
			<?php } ?>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	<?php if($isAuth == 1) {?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
	<?php } ?>
</div>
