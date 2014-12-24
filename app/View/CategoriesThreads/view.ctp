<div class="categoriesThreads view">
<h2><?php  __('Categories Thread');?></h2>
	<?php $i = 0; $class = ' | ';?>
		<?php if ($i % 2 == 0) echo $class;?><?php __('Category'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $this->Html->link($categoriesThread['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoriesThread['Category']['id'])); ?>
			&nbsp;
		<?php if ($i % 2 == 0) echo $class;?><?php __('Thread'); ?>
		<?php if ($i++ % 2 == 0) echo $class;?>
			<?php echo $this->Html->link($categoriesThread['Thread']['title'], array('controller' => 'threads', 'action' => 'view', $categoriesThread['Thread']['id'])); ?>
			&nbsp;
	
	
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categories Thread'), array('action' => 'edit', $categoriesThread['CategoriesThread']['category_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Categories Thread'), array('action' => 'delete', $categoriesThread['CategoriesThread']['category_id']), null, sprintf(__('Are you sure you want to delete # %s?'), $categoriesThread['CategoriesThread']['category_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Threads'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories Thread'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
