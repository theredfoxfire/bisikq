<div class="generalrules view">
<h2>General Rules<?php  __('Generalrule');?></h2>
	<?php $i = 0; $class = ' | ';?>
		<?php if ($i % 2 == 0) echo $class;?><?php __('Id'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $generalrule['Generalrule']['id']; ?>
			&nbsp;
	
		<?php if ($i % 2 == 0) echo $class;?><?php __('Title'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $generalrule['Generalrule']['title']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Rules'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $generalrule['Generalrule']['rules']; ?>
			&nbsp;
		<?php if($isAuth == 1) {?>
		<?php if ($i % 2 == 0) echo $class;?><?php __('Is Publish'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $generalrule['Generalrule']['is_publish']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Created At'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $generalrule['Generalrule']['created_at']; ?>
			&nbsp;
		
		<?php if ($i % 2 == 0) echo $class;?><?php __('Updated At'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $generalrule['Generalrule']['updated_at']; ?>
			&nbsp;
		<?php } ?>
	
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
