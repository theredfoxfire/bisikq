<div class="contacts view">
<h2><?php  __('Contact');?></h2>
	<?php $i = 0; $class = ' | ';?>
		<?php if ($i % 2 == 0) echo $class;?><?php __('Id'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $contact['Contact']['id']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Name'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $contact['Contact']['name']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Email'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $contact['Contact']['email']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Subject'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $contact['Contact']['subject']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Description'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $contact['Contact']['description']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Is Confirm'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $contact['Contact']['is_confirm']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Created At'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $contact['Contact']['created_at']; ?>
			&nbsp;
		
	
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contact'), array('action' => 'edit', $contact['Contact']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Contact'), array('action' => 'delete', $contact['Contact']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $contact['Contact']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?></li>
	</ul>
</div>
