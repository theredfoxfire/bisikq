
    <div class="main-right col-sm-9">
		<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				
              	<div class="panel panel-default">
                	<div class="panel-heading">
                      	<div class="panel-title">
                  		<i class="glyphicon glyphicon-wrench pull-right"></i>
                      	<h4>Post New Thread</h4>
                      	</div>
                	</div>
			<div class="panel-body">

                      <!--<form class="form form-vertical" method="post" action="/projects/bisikq/threads/add">-->
                      <?php echo $this->Form->create('Thread', array('url' => array('action' => 'add'), 'enctype' => 'multipart/form-data')); ?>
                       
						
                        <div class="control-group">
                          
                          <div class="controls">
                          <?php
							echo $this->Form->input('title', array('type' => 'text', 'class' => 'form-control', 'label'=>'Judul' ));
                          ?>
                           <!-- <input type="text" name="data[Thread][title]" class="form-control"> -->
                          </div>
                        </div>  
                        
                        <div class="control-group">
                          
                          <div class="controls">
                          <?php
							echo $this->Form->input('image', array('type' => 'file', 'class' => 'form-control', 'label'=>'Gambar' ));
                          ?>
                           <!-- <input type="text" name="data[Thread][title]" class="form-control"> -->
                          </div>
                        </div>  
						
						<div class="control-group">
                          <label>Category</label>
                          <div class="controls">
                             <select class="form-control" name="data[Thread][category_id]">
								<?php foreach ($categories as $category):?>
								<option value=" <?php echo $category['Category']['id']; ?> "><?php echo $category['Category']['name']; ?></option>
								 <?php
									endforeach; 
								 ?>
							</select>
                          </div>
                        </div>
						
						   
						<div class="control-group">
                          <label>Message</label>
                          <div class="controls">
                          	<textarea name="data[Thread][content]" class="form-control"></textarea>
                          </div>
                        </div>
                        
                        <div class="control-group">
                          	<label></label>
                        	<div class="controls">
                        	<?php
                        	echo $this->Form->button('Submit', array('class'=>'btn btn-info'));
							echo "&nbsp;&nbsp;".$this->Form->button('Cancel', array(
													'type' => 'button',
													'class'=> 'btn btn-danger',
													'onclick' => 'location.href=\'/projects/bisikq/threads/index\''
													));
							?>
                        	</div>
                        </div>   
                        
                      </form>
                
                
                  </div>
				    </div>
			</div>
     
      </div><!--/row-->
      
      <hr>
      

      
  	</div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->
</div>
