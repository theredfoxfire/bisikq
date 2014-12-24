
    <div class="main-right col-sm-9">
		<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				
              	<div class="panel panel-default">
                	<div class="panel-heading">
                      	<div class="panel-title">
                  		<i class="glyphicon glyphicon-wrench pull-right"></i>
                      	<h4>Edit Category</h4>
                      	</div>
                	</div>
			<div class="panel-body">

                    <?php echo $this->Form->create('Thread', array('url' => array('action' => 'edit'), 'enctype' => 'multipart/form-data')); ?>
                      
                       
                       <?php
                           echo $this->Form->input('id');
                           ?>
                        <div class="control-group">
                           <div class="controls">
                                <?php
                               echo $this->Form->input('title', array('type' => 'text', 'class' => 'form-control' ));
                               ?>
                           </div>
                       </div>
                       <div class="control-group">
                           <div class="controls">
                                <?php
                               echo $this->Form->input('image', array('type' => 'file', 'class' => 'form-control', 'label' => 'Gambar' ));
                               ?>
                           </div>
                       </div>
                        <div class="control-group">
                           <div class="controls">
                                <?php
                               echo $this->Form->input('content', array('type' => 'textarea', 'class' => 'form-control' ));
                               ?>
                           </div>
                       </div>
                        <div class="control-group">
                           <div class="controls">
                                <?php
                               echo $this->Form->input('is_publish', array('type' => 'checkbox', 'class' => 'form-control' ));
                               ?>
                           </div>
                       </div>
                        <div class="control-group">
                           <div class="controls">
                                <div class="control-group">
                          <label>Category</label>
                          <div class="controls">
                             <select class="form-control" name="data[Thread][category_id]">
								<?php foreach ($categories as $category):?>
								<option value=" <?php echo $category['Category']['id']; ?> " <?php if($thread['Thread']['category_id'] === $category['Category']['id']) {echo"selected";}?> ><?php echo $category['Category']['name']; ?></option>
								 <?php
									endforeach; 
								 ?>
							</select>
                          </div>
                        </div>
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
                        
                     <?php echo $this->Form->end();?>
                
                
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
