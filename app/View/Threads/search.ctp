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
					<h3>Hasil Pencarian</h3>
				</div>
			</div>
		</div>
		<div class="main-content">
			<div class="container">
				<div class="box-list col-sm-12">
					<div class="sub box-list-head">
						<div class="box-list-head-title">
							<div class="p-first">Hasil Pencarian</div>
						</div>
						<div class="box-list-head-more"><button type="button" class="btn-inquiry btn btn-warning" data-toggle="modal" data-target=".inquiry-bs-example-modal-lg">Hubungi Kami</button></div>
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
						<div class="box-list-thread thread">
						
						<?php 
							if($threads) {
							foreach ($threads as $thread):
						?>
							<div class="list-thread">
								<div class="sort col-sm-8">
									<?php
										echo $this->Html->link($thread['Thread']['title'], array('controller' => 'replythreads', 'action' => 'seeall', $thread['Thread']['id']));
									?><br />
									<div class="d-thread">
										<div class="by-thread"><i class="c-down fa fa-chevron-down"></i><i>&nbsp;Diposting: <?php echo $thread['Thread']['created_at']?></i></div>
										<div class="page-thread">
											<ul>
												<li>( <i class="fa fa-file-o"></i> </li>
												<?php
													$tid = $thread['Thread']['id'];
													$page = $reply->getPage($thread['Thread']['id']);
													if($page<5){
														for($i=1;$i<=$page;$i++){
															echo "<li><a href='/bisiq/replythreads/seeall/$tid/page:$i'>$i</a></li>";
														}
													} else {
														for($i=1;$i<=5;$i++){
															echo "<li><a href='/bisiq/replythreads/seeall/$tid/page:$i'>$i</a></li>";
														}
														echo "......<li><a href='/bisiq/replythreads/seeall/$tid/page:$page'>$page</a></li>";
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
											$lastReply = $reply->getLastReply($thread['Thread']['id']);
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
									</div>
								</div>
								<div class="stat col-sm-2">
									<div class="reply-thread"><a href="/projects/bisikq/replythreads/seeall/<?php echo $tid; ?>/">Balasan : 
									<?php
										$countReply = $reply->getCountReply($thread['Thread']['id']);
										if($countReply){
											echo $countReply;
										} else {
											echo "0";
										}
									?>
									</a></div>
									<div class="view-thread">Dilihat : <b><?php echo $thread['Thread']['visited'];?></b></div>
								</div>
								<div class="clear"></div>
							</div>
							
							<?php 
									endforeach;
								} 
							?>
							<!-- Pagination -->
							<div class="pagination pagination-large">
							<ul class="pagination pagination-sm">
								<?php
									echo $this->Paginator->prev(__("Prev"), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
									echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
									echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
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
						</div>
					</div>
				</div>
			</div>
		</div>
		
				<!-- Large modal Inquiry -->
		<div class="modal fade inquiry-bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h3 class="modal-title">Tulis Pesan</h3>
				</div>
				<div class="modal-body">
					<div class="post-comm col-sm-12">
						<!--<form class="form-contact" role="form" method="post" id="form-contact" action="/projects/bisikq/contacts/sentemail">-->
							<form class="form-contact" role="form" method="post" id="form-contact" action="/projects/bisikq/contacts/add">
						  <div class="form-group">
							<label for="exampleInputName">Nama</label>
							<input type="text" name="data[Contact][name]" class="form-control" id="exampleInputName" placeholder="Masukan nama" required>
						  </div>
						  <div class="form-group">
							<label for="exampleInputEmail">Email</label>
							<input type="email" name="data[Contact][email]" class="form-control" id="exampleInputEmail" placeholder="Masukan email" required>
						  </div>
						  <div class="form-group">
							<label for="exampleInputSubject">Subjek</label>
							<input type="text" name="data[Contact][subject]" class="form-control" id="exampleInputSubject" placeholder="Masukan subjek" required>
						  </div>
						  <div class="form-group">
							<label for="exampleInputDesc">Pesan</label>
							<textarea name="data[Contact][description]" class="form-control" id="exampleInputDesc" required></textarea>
						  </div>
						  <button type="submit" class="btn btn-default">Submit</button>
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
