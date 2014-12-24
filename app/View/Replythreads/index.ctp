<?php if($isAuth == 1) {?>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
    <div class="main-right col-sm-9">
		<div class="row">
			
         	<div class="col-md-12">
         	<h1><?php echo $thread['Thread']['title']; ?></h1>
         	<p><?php echo $thread['Thread']['content']; ?></p>
         	
         	</div>
		<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Threads Reply</h4> </div>
					<div class="panel-body table-responsive">
						
						<table class="table table-striped">
								<thead>
									<tr>
										<th><?php echo $this->Paginator->sort('id','No');?></th>										
										<th><?php echo $this->Paginator->sort('replayer','From');?></th>
										<th><?php echo $this->Paginator->sort('thread_id', 'Thread');?></th>
										<th><?php echo $this->Paginator->sort('text','Thread Reply');?></th>
										<th><?php echo $this->Paginator->sort('is_publish','Status');?></th>
										<th><?php echo $this->Paginator->sort('created_at', 'Created At');?></th>
										<th >Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$page = $this->Paginator->current();
									$limit = 10;
									$i = ($page * $limit) - ($limit - 1);
									if(0!=count($replythreads)):
										foreach ($replythreads as $replythread):
									
										
								?>
									<tr>
										<td><?php echo $i; ?>&nbsp;</td>
										<td><?php echo $replythread['Replythread']['replyer']; ?>&nbsp;</td>
										<td><?php echo $this->Html->link($replythread['Thread']['title'], array('controller' => 'threads', 'action'=>'view', $replythread['Thread']['id'])); ?>&nbsp;</td>
										<td><?php echo $replythread['Replythread']['text']; ?>&nbsp;</td>
										<td><?php if($replythread['Replythread']['is_publish'] == 1){echo "Published" ;} else {echo"Unpublished";} ?>&nbsp;</td>
										<td><?php echo $replythread['Replythread']['created_at']; ?>&nbsp;</td>
										<td>
												<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Hapus thread reply")), array('controller'=>'replythreads', 'action' => 'softdelete', $replythread['Replythread']['id']), array('escape' => false), __('Apakah Anda yakin akan menghapus reply thread %s?', 
												$replythread['Replythread']['text'])); ?>
										</td>
									</tr>
								<?php 
								$i ++;
								endforeach; 
								else:
								?>
								<tr>
									<td colspan="7">
										No reply
									</td>
								</tr>
								<?php endif; ?>
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
<?php
	}
?>
