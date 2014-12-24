<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
</script>
    <div class="main-right col-sm-9">
		<div class="row">
			
		<div class="col-md-12">
				
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Admins List</h4> </div>
					<div class="panel-body table-responsive">
						
						<table class="table table-striped">
								<thead>
									<tr>
										<th><?php echo $this->Paginator->sort('id','No');?></th>
										<th><?php echo $this->Paginator->sort('username');?></th>
										<th><?php echo $this->Paginator->sort('password');?></th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$page = $this->Paginator->current();
									$limit = 10;
									$i = ($page * $limit) - ($limit - 1);
									
										foreach ($admins as $admin):
										
								?>
									<tr>
										<td><?php echo $i; ?>&nbsp;</td>
										<td><?php echo $admin['Admin']['username']; ?>&nbsp;</td>
										<td><?php echo $admin['Admin']['password']; ?>&nbsp;</td>
										<td>
											<a href="/projects/bisikq/admins/edit/<?php echo $admin['Admin']['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Ubah password Admin"><i class='glyphicon glyphicon-edit'></i></a>
											
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
