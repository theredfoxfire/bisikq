<?php 
	App::import("Model", "Replythread");
	App::import("Model", "Threadrate");
	$reply = new Replythread();
	$rate = new Threadrate();
	if($isAuth == 10) {
?>
	<!-- Header -->
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
        <li class="active"><?php echo $this->Html->link("<i class='glyphicon glyphicon-briefcase'></i> Categories", array('controller'=>'categories', 'action' => 'index'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link("<i class='glyphicon glyphicon-link'></i> Reply Threads", array('controller'=>'replythreads', 'action' => 'index'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link("<i class='glyphicon glyphicon-book'></i> Reported Threads Reply", array('controller'=>'threadreports', 'action' => 'index'), array('escape' => false)); ?></li>
      </ul> 
      
  	</div><!-- /col-3 -->
    <div class="main-right col-sm-9">
		<div class="row">
			
         	<div class="col-md-12">
                  <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php 
			echo $this->Session->flash(); ?>
                  </div>
			</div>
			  
            <!-- center left-->	
         	<div class="col-md-12">
				<?php echo $this->Html->link("<button type='button' class='btn-add btn btn-primary' >Create New</button>", array('controller' => 'categories', 'action' => 'add'),  array('escape' => false)); ?>
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Categories</h4> </div>
					<div class="panel-body">
						
						<table class="table table-striped">
								<thead>
									<tr>
										<th><?php echo $this->Paginator->sort('id','No');?></th>
										<th><?php echo $this->Paginator->sort('name','Created By');?></th>
										<th><?php echo $this->Paginator->sort('is_publish');?></th>
										<th colspan="3">Action</th>
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
										<td><?php echo $category['Category']['is_publish']; ?>&nbsp;</td>
										<td>
											<?php echo $this->Html->link("<i class='glyphicon glyphicon-search'></i>", array('controller'=>'categories', 'action' => 'edit', $category['Category']['id']), array('escape' => false)); ?>
										</td>
										<td>
											<?php echo $this->Html->link("<i class='glyphicon glyphicon-edit'></i>", array('controller'=>'categories', 'action' => 'edit', $category['Category']['id']), array('escape' => false)); ?>
										</td>
										<td>
											<?php echo $this->Html->link("<i class='glyphicon glyphicon-remove'></i>", array('controller'=>'categories', 'action' => 'delete', $category['Category']['id']), array('escape' => false)); ?>
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
      
      <div class="row">
        <div class="col-md-12">
          <ul class="list-group">
            <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i> The 3rd page reports don't contain any links. Does anyone know why..</a></li>
            <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i> Hi all, I've just post a report that show the relationship betwe..</a></li>
            <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i> Hi all, I've just post a report that show the relationship betwe..</a></li>
          </ul>
        </div>
      </div>
  	</div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->

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

<?php } else {?>
		<div class="main-head">
			<div class="container">
				<div class="welcome col-sm-12">
					<h2>Selamat Datang</h2>
					<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
				</div>
			</div>
		</div>
		<div class="main-content">
			<div class="container">
			<?php
				foreach ($categories as $category):
			?>
				<div class="box-list col-sm-12">
					<div class="box-list-head">
						<div class="box-list-head-title">
							<div class="p-head"><?php echo $category['Category']['name'];?></div>
						</div>
						<div class="box-list-head-more"><?php echo $this->Html->link('Lihat Semua', array('controller' => 'threads', 'action' => 'seeall', $category['Category']['id'])); ?></div>
						<div class="clear"></div>
					</div>
					<div class="box-list-body">
						<div class="box-list-body-top">
							<div class="sort col-sm-8">
								Urut berdasarkan <b>Postingan Terakhir</b>
							</div>
							<div class="date col-sm-2">
								<b>Last Post</b>
							</div>
							<div class="stat col-sm-2">
								<b>Stats</b>
							</div>
							<div class="clear"></div>
						</div>
						<?php foreach ($category['Thread'] as $thread):?>
						<div class="thread">
							<div class="list-thread">
								<div class="sort col-sm-8">
									<?php	echo $this->Html->link($thread['title'], array('controller' => 'replythreads', 'action' => 'seeall', $thread['id']));?>
									<br />
									<div class="d-thread">
										<div class="by-thread"><i class="c-down fa fa-chevron-down"></i><i>&nbsp;Diposting: <?php echo $thread['created_at']?></i></div>
										<div class="page-thread">
											<ul>
												<li>( <i class="fa fa-file-o"></i> </li>
												<?php
													$tid = $thread['id'];
													$page = $reply->getPage($thread['id']);
													if($page<5){
														for($i=1;$i<=$page;$i++){
															echo "<li><a href='/projects/bisikq/replythreads/seeall/$tid/page:$i'>$i</a></li>";
														}
													} else {
														for($i=1;$i<=5;$i++){
															echo "<li><a href='/projects/bisikq/replythreads/seeall/$tid/page:$i'>$i</a></li>";
														}
														echo "......<li><a href='/projects/bisikq/replythreads/seeall/$tid/page:$page'>$page</a></li>";
													}
												 ?>
												<li>)</li>
											</ul>
										</div>
										<div class="rate-thread">
											
										</div>
									</div>
								</div>
								<div class="date col-sm-2">
									
										<?php 
											$lastReply = $reply->getLastReply($thread['id']);
											if($lastReply){
											echo "<div class='date-thread'>".$lastReply['Replythread']['created_at']."</div>";
											echo "<div class='by-thread'><i class='c-down fa fa-chevron-right'></i> <i>Oleh ";
											echo $lastReply['Replythread']['replyer'];
											} else {
												echo "<div class='date-thread'>No date reply</div>";
												echo "<div class='by-thread'><i class='c-down fa fa-chevron-right'></i> <i>Oleh ";
												echo "not yet replied";
											}
										?>
									</i></div>
								</div>
								<div class="stat col-sm-2">
									<div class="reply-thread"><a href='/projects/bisikq/replythreads/seeall/<?php echo $tid; ?>/'>Balasan: 
									<?php
										$countReply = $reply->getCountReply($thread['id']);
										if($countReply){
											echo $countReply;
										} else {
											echo "0";
										}
									?>
									</a></div>
									<div class="view-thread">Dilihat : <b><?php echo $thread['visited'];?></b></div>
								</div>
								<div class="clear"></div>
							</div>
							
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php
				endforeach;
				?>
				
			</div>
		</div>

<?php } ?>
