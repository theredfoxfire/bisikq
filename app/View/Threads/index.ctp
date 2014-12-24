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
				<?php echo $this->Html->link("<button type='button' class='btn-add btn btn-primary' >Create New</button>", array('controller' => 'threads', 'action' => 'add'),  array('escape' => false)); ?>
                <form class="search-th form form-inline" method="get" action="/projects/bisikq/threads/">
                <input type="text" name="content" value="<?php echo $content; ?>" placeholder="Search">
                <select name="category">
					<option value="">All Categories</option>
                    <?php foreach ($categories as $category):?>
                    <option value="<?php echo $category['Category']['id']; ?>" <?php echo ($category_id == $category['Category']['id']) ? 'selected' : ''; ?>><?php echo $category['Category']['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="search-btn"><i class="glyphicon glyphicon-search"></i></button>
                </form> 
				<div class="panel panel-default">					
					<div class="panel-heading"><h4>Threads</h4></div>
					<div class="panel-body table-responsive">
						
						<table class="table table-striped">
								<thead>
									<tr>
										<th><?php echo $this->Paginator->sort('id','No');?></th>
										<th><?php echo $this->Paginator->sort('admin_id','Created By');?></th>
										<th><?php echo $this->Paginator->sort('category_id','Category');?></th>
										<th><?php echo $this->Paginator->sort('title');?></th>
										<th><?php echo $this->Paginator->sort('is_publish', 'Status');?></th>
										<th><?php echo $this->Paginator->sort('created_at','Created At');?></th>
										<th colspan="3">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$page = $this->Paginator->current();
									$limit = 10;
									$i = ($page * $limit) - ($limit - 1);
									
										foreach ($threads as $thread):
										
								?>
									<tr>
										<td><?php echo $i; ?>&nbsp;</td>
										<td><?php echo $thread['Admin']['username']; ?>&nbsp;</td>
										<td><?php echo $thread['Category']['name']; ?>&nbsp;</td>
										<td><?php echo $thread['Thread']['title']; ?>&nbsp;</td>
										<td><?php if($thread['Thread']['is_publish'] == 1){echo "Published" ;} else {echo"Unpublished";} ?>&nbsp;</td>
										<td><?php echo $thread['Thread']['created_at']; ?>&nbsp;</td>
										<td>
											<a href="/projects/bisikq/replythreads/index/<?php echo $thread['Thread']['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Lihat balasan thread"><i class='glyphicon glyphicon-comment'></i></a>
										</td>
										<td>
											<a href="/projects/bisikq/threads/edit/<?php echo $thread['Thread']['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit thread"><i class='glyphicon glyphicon-edit'></i></a>
											
										</td>
										<td>
											<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Hapus thread")), array('controller'=>'threads', 'action' => 'softdelete', $thread['Thread']['id']), array('escape' => false), __('Apakah Anda yakin akan menghapus thread %s?', 
												$thread['Thread']['title'])); ?>
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

	<div id="wrap">
		<header>
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" rel="home" href="#">LOGO BISIKQ</a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse">
						<div class="col-sm-3 col-md-3 pull-right">
						  <form class="navbar-form" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Thread Search" name="srch-term" id="srch-term">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						  </form>
						</div>
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">COMPANY PROFILE</a></li>
							<li><a href="#">GENERAL RULES</a></li>
							<li class="nav-last"><a href="#">CONTACT US</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<div class="main-head">
			<div class="container">
				<div class="subheader col-sm-12">
					<h3>Apartemen List</h3>
				</div>
			</div>
		</div>
		<div class="main-content">
			<div class="container">
				<div class="box-list col-sm-12">
					<div class="sub box-list-head">
					<?php 
						foreach ($all as $cat): 
						if($cat['Category']['id'] === $idcategory){
					?>
						<div class="box-list-head-title">
							<a href=""><div class="p-first"><?php echo $cat['Category']['name']; ?></div></a>
						</div>
					<?php
						} else {
					?>
							<div class="box-list-head-title">
								<a href=""><div class="p-head"><?php echo $cat['Category']['name'];?></div></a>
							</div>
					<?php
						}
						endforeach;
					?>
						<div class="box-list-head-more"><button type="button" class="btn-inquiry btn btn-warning">Inquiry</button></div>
						<div class="clear"></div>
					</div>
					<div class="box-list-body">
						<div class="box-list-body-top">
							<div class="sort col-sm-8">
								Sorting by <b>Last Post</b> &nbsp; &nbsp;<a href="" title="Sort Ascending"><i class="c-sort fa fa-chevron-up"></i></a> <i>descending</i>
							</div>
							<div class="date col-sm-2">
								<b>Last Post</b>
							</div>
							<div class="stat col-sm-2">
								<b>Stats</b>
							</div>
							<div class="clear"></div>
						</div>
						<div class="box-list-thread thread">
						
						<?php 
							if($category['Thread']) {
							foreach ($category['Thread'] as $thread):
						?>
							<div class="list-thread">
								<div class="sort col-sm-8">
									<?php
										echo $this->Html->link($thread['title'], array('controller' => 'threads', 'action' => 'view', $thread['id']));
									?><br />
									<div class="d-thread">
										<div class="by-thread"><i class="c-down fa fa-chevron-down"></i> <i>by <?php echo $thread['Admin']['username'];?></i></div>
										<div class="page-thread">
											<ul>
												<li>( <i class="fa fa-file-o"></i> </li>
												<?php
													$page = $reply->getPage($thread['id']);
													if($page<5){
														for($i=1;$i<=$page;$i++){
															echo "<li><a href=''>$i</a></li>";
														}
													} else {
														for($i=1;$i<=5;$i++){
															echo "<li><a href=''>$i</a></li>";
														}
														echo "......<li><a href=''>$page</a></li>";
													}
												 ?>
												<li>)</li>
											</ul>
										</div>
										<div class="rate-thread">
										<?php
											$rating = $rate->getRate($thread['id']);
											$rates = round($rating, 0, PHP_ROUND_HALF_ODD);
											if($rating){
												for ($i=0;$i<$rates;$i++){
													echo "<i class='fa fa-star'></i>";
												}
											} else {
												echo "No rate";
											}
										?>
										</div>
									</div>
								</div>
								<div class="date col-sm-2">
									<?php 
											$lastReply = $reply->getLastReply($thread['id']);
											if($lastReply){
											echo "<div class='date-thread'>".$lastReply['Replythread']['created_at']."</div>";
											echo "<div class='by-thread'><i class='c-down fa fa-chevron-right'></i> <i>by ";
											echo $lastReply['Replythread']['replyer'];
											} else {
												echo "<div class='date-thread'>No date reply</div>";
												echo "<div class='by-thread'><i class='c-down fa fa-chevron-right'></i> <i>by ";
												echo "not yet replied";
											}
									?>
									</div>
								</div>
								<div class="stat col-sm-2">
									<div class="reply-thread"><a href="">Replies : 
									<?php
										$countReply = $reply->getCountReply($thread['id']);
										if($countReply){
											echo $countReply;
										} else {
											echo "0";
										}
									?>
									</a></div>
									<div class="view-thread">Views : <b><?php echo $thread['visited'];?></b></div>
								</div>
								<div class="clear"></div>
							</div>
							
							<?php 
									endforeach;
								} 
							?>
							<!-- Pagination -->
							<nav class="paging">
							  <ul class="pagination pagination-sm">
								<li><span class="page" aria-hidden="true">Page 1 of 22</span></li>
								<li><a href="#"><span aria-hidden="true"><i class="fa fa-chevron-left"></i></span><span class="sr-only">Previous</span></a></li>
								<li><a class="active" href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#"><span aria-hidden="true"><i class="fa fa-chevron-right"></i></span><span class="sr-only">Next</span></a></li>
								<li><a href="#"><span aria-hidden="true"><i class="fa fa-forward"></i></span><span class="sr-only">Last</span></a></li>
							  </ul>
							</nav>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<div class="footer-left col-sm-6">
					<ul class="second-menu">
						<li><a href="">Home</a></li>
						<li><a href="">General Rules</a></li>
						<li><a href="">Company Profile</a></li>
						<li><a href="">Contact Us</a></li>
					</ul>
					Copyright ⓒ 2014 BISIKQ. All Rights Reserved
				</div>
				<div class="footer-right col-sm-6">
					<ul class="sosmed">
						<li><a href=""><?php echo $this->Html->image('sosial/fb.png'); ?></a></li>
						<li><a href=""><?php echo $this->Html->image('sosial/google-plus.png'); ?></li>
						<li><a href=""><?php echo $this->Html->image('sosial/linkedin.png'); ?></a></li>
						<li><a href=""><?php echo $this->Html->image('sosial/pinterest.png'); ?></a></li>
						<li><a href=""><?php echo $this->Html->image('sosial/twitter.png'); ?></a></li>
						<li><a href=""><?php echo $this->Html->image('sosial/dribel.png'); ?></a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>

<?php } ?>
