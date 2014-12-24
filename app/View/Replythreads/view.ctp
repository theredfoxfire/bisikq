<?php if($isAuth == 1){ ?>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
    <div class="main-right col-sm-9">
		<div class="row">
			<?php if($this->Session->flash()){ ?>
         	<div class="col-md-12">
                  <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php 
			echo $this->Session->flash(); ?>
                  </div>
			</div>
			<?php }?>
		<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Threads Reply</h4> </div>
					<div class="panel-body">
						
						<table class="table table-striped">
								<thead>
									<tr>
										<th><?php echo 'No';?></th>										
										<th><?php echo 'From';?></th>
										<th><?php echo 'Thread';?></th>
										<th><?php echo 'Comment';?></th>
										<th><?php echo 'Status';?></th>
										<th><?php echo 'Created At';?></th>
										<th colspan="3">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$page = 1;
									$limit = 10;
									$i = ($page * $limit) - ($limit - 1);
								?>
									<tr>
										<td><?php echo $i; ?>&nbsp;</td>
										<td><?php echo $replythread['Replythread']['replyer']; ?>&nbsp;</td>
										<td><?php echo $this->Html->link($replythread['Thread']['title'], array('controller' => 'threads', 'action'=>'view', $replythread['Thread']['id'])); ?>&nbsp;</td>
										<td><?php echo $replythread['Replythread']['text']; ?>&nbsp;</td>
										<td><?php if($replythread['Replythread']['is_publish'] == 1){echo "Published" ;} else {echo"Unpublished";} ?>&nbsp;</td>
										<td><?php echo $replythread['Replythread']['created_at']; ?>&nbsp;</td>
										<td>
												<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Hapus thread reply")), array('controller'=>'threadreports', 'action' => 'softdelete',$rid,$replythread['Replythread']['id']), array('escape' => false), __('Apakah Anda yakin akan menghapus reply thread %s?', 
												$replythread['Replythread']['text'])); ?>
										</td>
									</tr>
								<?php 
								?>
								</tbody>
						</table>
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
