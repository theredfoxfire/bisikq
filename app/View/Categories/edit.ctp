
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

                    <?php echo $this->Form->create('Category');?>
                      
                          <?php
                           echo $this->Form->input('id');
                           ?>
                        
                        <div class="control-group">
                           <div class="controls">
                                <?php
                               echo $this->Form->input('name', array('type' => 'text', 'class' => 'form-control' ));
                               ?>
                           </div>
                       </div>
                        <div class="control-group">
                           <div class="controls">
                                <?php
                               echo $this->Form->input('is_publish', array('type' => 'checkbox', 'class' => 'form-control'));
                               ?>
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
													'onclick' => 'location.href=\'/projects/bisikq/categories/adminindex\''
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
