<?php
	App::import("Model", "Replythread");
	App::import("Model", "Threadrate");
	$reply = new Replythread();
	$rate = new Threadrate();
	
	if($isAuth == 1){
?>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
    <div class="main-right col-sm-9">
		<div class="row">

		<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Threads</h4> </div>
					<div class="panel-body">
						
						<table class="table table-striped">
								<thead>
									<tr>
										<th><?php echo 'No';?></th>
										<th><?php echo 'Created By';?></th>
										<th><?php echo 'Category';?></th>
										<th><?php echo 'title';?></th>
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
		
	}else{
?>
		
		<div class="main-head">
			<div class="container">
				<div class="subheader col-sm-12">
					<h3>View Thread</h3>
				</div>
			</div>
		</div>
		<div class="main-content">
			<div class="container">
				<div class="box-list col-sm-12">
					<div class="sub box-list-head">
						<div class="box-list-head-title">
							<a href=""><div class="p-first">Apartment</div></a>
						</div>
						
						<div class="box-list-head-title">
							<a href=""><div class="p-head">Town / Complex</div></a>
						</div>
						
						<div class="box-list-head-title">
							<a href=""><div class="p-head">Area</div></a>
						</div>
						<div class="clear"></div>
					</div>
					<div class="box-list-body">
						<div class="detail-thread thread">
							<div class="detail-img col-sm-4">
								<?php echo $this->Html->image('thread/1.jpg'); ?>
							</div>
							<div class="detail-desc col-sm-8">
								<h3><?php echo $thread['Thread']['title'] ?></h3>
								<div class="by-thread"><i class="c-down fa fa-chevron-down"></i> <i>by <?php echo $thread['Admin']['username'];?></i></div>
										<div class="rate-thread">
										<?php
											$rating = $rate->getRate($thread['Thread']['id']);
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
								<br /><br />
								<span>Thread Content :</span> <br />
								<?php echo $thread['Thread']['content'] ?>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class="box-list-body">
						<div class="box-list-body-top">
						</div>					
						<div class="comm box-list-thread thread">
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
							<div class="comm-box col-sm-12">
							<?php 
							if (!empty($thread['Replythread'])):
							$i = 0;
							foreach ($thread['Replythread'] as $replythread):
								$i++;
							?>
								<table class="comm-table">
									<tr>
										<td class="comm-num"><?php echo $i; ?></td>
										<td class="comm-ic"><i class="glyphicon glyphicon-play"></i></td>
										<td class="comm-detail">
											<div class="by-comm">
												<div class="by-left"><i>by <span><?php echo $replythread['replyer']; ?></span></i></div>
												<div class="by-right">
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Reply</button>
													 &nbsp;&nbsp;&nbsp; 
													 <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".report-bs-example-modal-lg">Report Post</button>
												</div>
												<div class="clear"></div>
											</div>
											<div class="comment">
												<?php echo $replythread['text'] ?>
											</div>
										</td>
									</tr>
								</table>
							<?php  
								endforeach;
							endif;
							?>
							</div>
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
					<div class="post box-list-body">
						<div class="post-comm col-sm-12">
							<h3>Write a Post</h3>
							<h4>Thread Title : <?php echo $thread['Thread']['title']; ?></h4>
							<form class="post-form" role="form" action="/bisiq/replythreads/add/<?php echo $thread['Thread']['id']; ?>" method="post">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control" name="data[Replythread][replyer]" id="name" placeholder="Enter name">
									
									<label for="name">&nbsp;&nbsp;&nbsp;or select anonymous</label>
									<select name="" class="form-control">
										<option selected>Please select</option>
										<option>Sample select one</option>
										<option>Sample select two</option>
										<option>Sample select three</option>
									</select>
									<div class="clear"></div>
								</div>
								<textarea name="data[Replythread][text]" class="form-control"></textarea>
								
								<button type="submit" class="btn btn-default">Send</button>
							</form>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Large modal Reply -->
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h3 class="modal-title">Write a Reply</h3>
				</div>
				<div class="modal-body">
					<div class="post-comm col-sm-12">
						<h4>Reply on : No. 123</h4>
						<h4>Thread Title : <?php echo $thread['Thread']['title']; ?></h4>
						<form class="post-form" role="form" >
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" placeholder="Enter name">
										
								<label for="name">&nbsp;&nbsp;&nbsp;or select anonymous</label>
								<select class="form-control">
									<option selected>Please select</option>
									<option>Sample select one</option>
									<option>Sample select two</option>
									<option>Sample select three</option>
								</select>
								<div class="clear"></div>
							</div>
							<textarea class="form-control"></textarea>
									
							<button type="submit" class="btn btn-default">Send</button>
						</form>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		  </div>
		</div>
		<!-- Large modal Report -->
		<div class="modal fade report-bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h3 class="modal-title">Report post</h3>
				</div>
				<div class="modal-body">
					<div class="post-comm col-sm-12">
						<h4>Report post on : No. 123</h4>
						<h4>Thread Title : Lorem ipsum dolor sit amet, sample</h4>
						<form class="post-form" role="form">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" placeholder="Enter name">
								
								<div class="clear"></div>
							</div>
							<label for="name">Reason</label>
							<textarea class="form-control"></textarea>
									
							<button type="submit" class="btn btn-default">Send</button>
						</form>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		  </div>
		</div>
<?php
	}
?>
