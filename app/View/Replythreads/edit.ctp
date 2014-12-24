
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
			<div class="col-md-12">
				
              	<div class="panel panel-default">
                	<div class="panel-heading">
                      	<div class="panel-title">
                  		<i class="glyphicon glyphicon-wrench pull-right"></i>
                      	<h4>Edit Reply</h4>
                      	</div>
                	</div>
			<div class="panel-body">

                    <?php echo $this->Form->create('Replythread');?>
                       
                        <div class="control-group">
                          <div class="controls">
                           <?php
							echo $this->Form->input('id');
							echo $this->Form->input('replyer', array('type' => 'text', 'class' => 'form-control' ));
							echo $this->Form->input('text',  array('type' => 'text', 'class' => 'form-control' ));
							echo $this->Form->input('is_publish', array('type' => 'checkbox', 'class' => 'form-control' ));
						   ?>
                          </div>
                        </div>
						
                      <?php echo $this->Form->end(__('Submit'));?>
                
                
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
