<?php 
	App::import("Model", "Replythread");
	App::import("Model", "Threadrate");
	$reply = new Replythread();
	$rate = new Threadrate();
	if($isAuth == 1) {
?>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
    <div class="main-right col-sm-9">
		<div class="row">
			
		<div class="col-md-12">
				<?php echo $this->Html->link("<button type='button' class='btn-add btn btn-primary' >Create New</button>", array('controller' => 'categories', 'action' => 'add'),  array('escape' => false)); ?>
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Categories</h4> </div>
					<div class="panel-body table-responsive">
						
						<table class="table table-striped">
								<thead>
									<tr>
										<th><?php echo $this->Paginator->sort('id','No');?></th>
										<th><?php echo $this->Paginator->sort('name','Name');?></th>
										<th><?php echo $this->Paginator->sort('is_publish', 'Status');?></th>
										<th colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$page = $this->Paginator->current();
									$limit = 10;
									$i = ($page * $limit) - ($limit - 1);
									
										foreach ($categories as $category):
										
								?>
									<tr>
										<td><?php echo $i; ?>&nbsp;</td>
										<td>
											<?php echo $category['Category']['name']; ?>&nbsp;
										</td>
										<td><?php if($category['Category']['is_publish'] == 1){echo "Published" ;} else {echo"Unpublished";} ?>&nbsp;</td>
										
										<td>
											<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Edit kategori")), array('controller'=>'categories', 'action' => 'edit', $category['Category']['id']), array('escape' => false)); ?>
										</td>
										<td>
											<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Hapus kategori")), array('controller'=>'categories', 'action' => 'softdelete', $category['Category']['id']), array('escape' => false), __('Apakah Anda yakin akan menghapus kategori %s?', 
												$category['Category']['name'])); ?>
										</td>
									</tr>
								<?php 
								$i ++;
								endforeach; 
								?>
								</tbody>
						</table>
						<div class="pagination pagination-large">
							<ul class="pagination pagination-sm">
								<?php
									echo $this->Paginator->prev(__("Prev"), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
									echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
									echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
								?>
							</ul>
						</div>
					</div>
              	</div>
			
          	</div><!--/col-->
        	
      
      <hr>

      
  	</div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->
</div>

<?php } else {?>

<?php } ?>
