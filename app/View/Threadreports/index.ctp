<?php if($isAuth == 1) {?>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>

    <div class="main-right col-sm-9">
		<div class="row">
			
		<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Threads Reply Reported</h4> </div>
					<div class="panel-body table-responsive">
						
						<table class="table table-striped">
								<thead>
									<tr>
										<th><?php echo $this->Paginator->sort('id','No');?></th>
										<th><?php echo $this->Paginator->sort('replythread_id','Thread Reply');?></th>
										<th><?php echo $this->Paginator->sort('reason');?></th>
										<th><?php echo $this->Paginator->sort('name','Reported By');?></th>
										<th><?php echo $this->Paginator->sort('is_confirm','Status');?></th>
										<th><?php echo $this->Paginator->sort('created_at');?></th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$page = $this->Paginator->current();
									$limit = 10;
									$i = ($page * $limit) - ($limit - 1);
									
										foreach ($threadreports as $threadreport):
										
								?>
									<tr>
										<td><?php echo $i; ?>&nbsp;</td>
										<td>
											<?php echo $this->Html->link($threadreport['Replythread']['text'], array('controller' => 'replythreads', 'action' => 'view', $threadreport['Replythread']['id'], $threadreport['Threadreport']['id'])); ?>
										</td>
										<td><?php echo $threadreport['Threadreport']['reason']; ?>&nbsp;</td>
										<td><?php echo $threadreport['Threadreport']['name']; ?>&nbsp;</td>
										<td><?php if($threadreport['Threadreport']['is_confirm'] == 1){echo "Confirmed" ;} else {echo"Unconfirmed";} ?>&nbsp;</td>
										<td><?php echo $threadreport['Threadreport']['created_at']; ?>&nbsp;</td>
										<td>
											<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Hapus thread reply")), array('controller'=>'threadreports', 'action' => 'softdelete', $threadreport['Threadreport']['id'], $threadreport['Replythread']['id']),  array('escape' => false), __('Apakah Anda yakin akan menghapus reply thread %s?', 
												$threadreport['Replythread']['text'])); ?>
											
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
<?php
	}
?>
