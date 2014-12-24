<?php
	App::import("Model", "Replythread");
	App::import("Model", "Threadrate");
	$reply = new Replythread();
	$rate = new Threadrate();
	
	if(($isAuth == 1) AND ($is_admin)){
		
	}else{
?>
		
		<div class="main-head">
			<div class="container">
				<div class="subheader col-sm-12">
					<h3>Lihat Thread</h3>
				</div>
			</div>
		</div>
		<div class="main-content">
			<div class="container">
				<div class="box-list col-sm-12">
					<div class="sub box-list-head">
                        <div class="box-list-head-title">
                            <a href="javascript:history.back()" title="back" data-toggle="tooltip" data-placement="top" title="Kembali"><div class="p-head"><i class="fa fa-reply"></i></div></a>
                        </div>
                        <div class="box-list-head-title">
                            <div class="p-first"><?php echo $this->Html->link('Kembali ke '.$thread['Category']['name'], array('controller' => 'threads', 'action' => 'seeall', $thread['Category']['id'])); ?></div>
                        </div>
                        <div class="clear"></div>
                    </div>
					<div class="box-list-body">
						<div class="detail-thread thread">
							<div class="detail-img col-sm-4">
								<?php if($thread['Thread']['image']){
										echo $this->Html->image('uploads/threads/' . $thread['Thread']['image']);
									} else {
										echo $this->Html->image('thread/1.jpg');
									}
								 ?>
							</div>
							<div class="detail-desc col-sm-8">
								<h3><?php echo $thread['Thread']['title']; ?></h3>
								
								<br /><br />
								<span></span> <br />
								<?php echo $thread['Thread']['content']; ?>
								<br/><br/>
								<?php echo "Diposting: ".$thread['Thread']['created_at']; ?>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<?php if (!empty($replythreads)){ ?>
					<div class="box-list-body">
						<div class="box-list-body-top">
						</div>					
						<div class="comm box-list-thread thread">
							<!-- Pagination -->
							<div class="pagination pagination-large">
							<ul class="pagination pagination-sm">
								<?php
									$count = $reply->getCountReply($thread['Thread']['id']);
									if($count > 10){
									echo $this->Paginator->prev(__("Prev"), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
									echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
									echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
									}
								?>
							</ul>
							</div>
							<!--<nav class="paging">
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
							</nav>-->
							<div class="clear"></div>
							<div class="comm-box col-sm-12">
							<?php 
							$page = $this->Paginator->current();
									$limit = 10;
									$i = ($page * $limit) - ($limit - 1);
							
							foreach ($replythreads as $replythread):
							?>
								<table class="comm-table">
									<tr>
										<td class="comm-num"><?php echo $i; ?></td>
										<td class="comm-ic"><i class="glyphicon glyphicon-play"></i></td>
										<td class="comm-detail">
											<div class="by-comm">
												<div class="by-left"><i>by <span><?php echo $replythread['Replythread']['replyer']; ?></span></i></div>
												<div class="by-right">													
													 &nbsp;&nbsp;&nbsp; 
													 <i>Diposting: <?php echo $replythread['Replythread']['created_at']; ?></i>&nbsp;
													 <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".report-bs-example-modal-lg<?php echo $i;?>">Laporkan</button>
												</div>
												<div class="clear"></div>
											</div>
											<div class="comment">
												<?php echo $replythread['Replythread']['text'] ?>
											</div>
										</td>
									</tr>
								</table>
		<!-- Large modal Report -->
		<div class="modal fade report-bs-example-modal-lg<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h3 class="modal-title">Laporkan post</h3>
				</div>
				<div class="modal-body">
					<div class="post-comm col-sm-12">
						<h4>Laporkan postingan : No. <?php echo $i;?></h4>
						<h4>Isi balasan : <?php echo $replythread['Replythread']['text'];?></h4>
						<!--<form class="post-form" role="form">-->
						<form class="post-form" role="form" action="/projects/bisikq/threadreports/add/<?php echo $replythread['Replythread']['id']; ?>/<?php echo $thread['Thread']['id']; ?>" method="post">
							<div class="form-group">
								<label for="name">Nama</label>
								<input type="text" class="form-control" id="name" name="data[Threadreport][name]" placeholder="Masukan nama" required>
								
								<div class="clear"></div>
							</div>
							<label for="name">Alasan</label>
							<textarea name="data[Threadreport][reason]" class="form-control" required></textarea>
									
							<button type="submit" class="btn btn-default">Kirim</button>
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
									$i++;
								endforeach;
							
							?>
							</div>
							<!-- Pagination
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
							</nav>-->
							<div class="pagination pagination-large">
							<ul class="pagination pagination-sm">
								<?php
								if($count > 10){
									echo $this->Paginator->prev(__("Prev"), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
									echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
									echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
									}
								?>
							</ul>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<?php } ?>
					<div class="post box-list-body">
						<div class="post-comm col-sm-12">
							<h3>Tulis balasan</h3>
							<h4>Judul thread : <?php echo $thread['Thread']['title']; ?></h4>
							<?php $idt = $thread['Thread']['id']; ?>
							<?php echo $this->Form->create('Replythread', array('action' => '/add/'.$idt, 'id' => 'replythread'));?>
								<div class="form-group">
									<?php
										echo $this->Form->input('replyer', array('type' => 'text', 'class' => 'form-control', 'label'=>'Nama' ));
									?>
									<div class="clear"></div>
								</div>
								<?php
								echo $this->Form->input('text', array('type' => 'textarea', 'class' => 'form-control' , 'label' => 'Balasan'));
								?>
								<?php echo $this->Form->end(__('Submit'));?>
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
						<form class="post-form" role="form" action="/projects/bisikq/replythreads/add/<?php echo $thread['Thread']['id']; ?>" method="post">
						<!--<form class="post-form" role="form" >-->
							<div class="form-group">
								<label for="name">Name</label>
								<!--<input type="text" class="form-control" id="name" placeholder="Enter name">-->
								<input type="text" class="form-control" name="data[Replythread][replyer]" id="name" placeholder="Enter name">
										
								<label for="name">&nbsp;&nbsp;&nbsp;or select anonymous</label>
								<select class="form-control">
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
				<div class="clear"></div>
			</div>
		  </div>
		</div>
		
		<div class="modal fade rate-bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h3 class="modal-title">Rate Thread</h3>
				</div>
				<div class="modal-body">
					<div class="post-comm col-sm-12">
						<h4>Thread Title : <?php echo $thread['Thread']['title']; ?></h4>
						<form class="rate-form" role="form" action="/projects/bisikq/threadrates/add/<?php echo $thread['Thread']['id']; ?>" method="post">
							<div class="form-group">
									<input class="radio-rate" type="radio" name="data[Threadrate][rates]" id="optionsRadios1" value="1"> 
									<div class="rate-thread">
										<i class="fa fa-star"></i>
									</div>
								<div class="clear"></div>
							</div>
							<div class="form-group">
									<input class="radio-rate" type="radio" name="data[Threadrate][rates]" id="optionsRadios1" value="2"> 
									<div class="rate-thread">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								<div class="clear"></div>
							</div>
							<div class="form-group">
									<input class="radio-rate" type="radio" name="data[Threadrate][rates]" id="optionsRadios1" value="3"> 
									<div class="rate-thread">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								<div class="clear"></div>
							</div>
							<div class="form-group">
									<input class="radio-rate" type="radio" name="data[Threadrate][rates]" id="optionsRadios1" value="4"> 
									<div class="rate-thread">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								<div class="clear"></div>
							</div>
							<div class="form-group">
									<input class="radio-rate" checked='checked' type="radio" name="data[Threadrate][rates]" id="optionsRadios1" value="5"> 
									<div class="rate-thread">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								<div class="clear"></div>
							</div>
									
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
<script>
	$("#replythread").validate();
</script>
