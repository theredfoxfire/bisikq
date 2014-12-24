<?php if($isAuth == 1) {?>
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">BISIKQ Administrator</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><?php echo $this->Html->link("<i class='glyphicon glyphicon-user'></i> Admin", array('controller'=>'admins', 'action' => 'index'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link('Logout', array('controller' => 'admins', 'action' => 'logout')); ?></li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">
<div class="row">
	<div class="sidebar col-sm-3">
      
     <ul class="nav nav-pills nav-stacked">
        <li><?php echo $this->Html->link("<i class='glyphicon glyphicon-list-alt'></i> Threads", array('controller'=>'threads', 'action' => 'index'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link("<i class='glyphicon glyphicon-briefcase'></i> Categories", array('controller'=>'categories', 'action' => 'adminindex'), array('escape' => false)); ?></li>
        <li class="active"><?php echo $this->Html->link("<i class='glyphicon glyphicon-link'></i> Reply Threads", array('controller'=>'replythreads', 'action' => 'index'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link("<i class='glyphicon glyphicon-book'></i> Reported Threads Reply", array('controller'=>'threadreports', 'action' => 'index'), array('escape' => false)); ?></li>
      </ul> 
      
  	</div><!-- /col-3 -->
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
         	<h1><?php echo $thread['Thread']['title']; ?></h1>
         	<p><?php echo $thread['Thread']['content']; ?></p>
         	</div>
		<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Threads Reply</h4> </div>
					<div class="panel-body">
						
						<table class="table table-striped">
								<thead>
									<tr>
										<th><?php echo $this->Paginator->sort('id','No');?></th>										
										<th><?php echo $this->Paginator->sort('replayer','From');?></th>
										<th><?php echo $this->Paginator->sort('thread_id', 'Thread');?></th>
										<th><?php echo $this->Paginator->sort('text','Comment');?></th>
										<th><?php echo $this->Paginator->sort('is_publish');?></th>
										<th><?php echo $this->Paginator->sort('created_at');?></th>
										<th colspan="3">Action</th>
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
										<td><?php echo $replythread['Replythread']['is_publish']; ?>&nbsp;</td>
										<td><?php echo $replythread['Replythread']['created_at']; ?>&nbsp;</td>
										<td>
											<?php echo $this->Html->link("<i class='glyphicon glyphicon-remove'></i>", array('controller'=>'replythreads', 'action' => 'delete', $replythread['Replythread']['id']), array('escape' => false)); ?>
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
<footer class="text-center">Copyright ⓒ 2014 BISIKQ. All Rights Reserved</footer>

<div class="modal" id="addWidgetModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Widget</h4>
      </div>
      <div class="modal-body">
        <p>Add a widget stuff here..</p>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->
<?php
	}
?>