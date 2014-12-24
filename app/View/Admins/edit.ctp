
    <div class="main-right col-sm-9">
		<div class="row">
			<div class="alert alert-danger" role="alert">
        <?php
			echo $this->Session->flash();
		?>
		</div>
		<div class="col-md-12">
			<div class="col-md-12">
				
              	<div class="panel panel-default">
                	<div class="panel-heading">
                      	<div class="panel-title">
                  		<i class="glyphicon glyphicon-wrench pull-right"></i>
                      	<h4>Edit Admin</h4>
                      	</div>
                	</div>
			<div class="panel-body">

                    <?php echo $this->Form->create('Admin');?>
                       
                        <div class="control-group">
                          <div class="controls">
                           <?php
							echo $this->Form->input('id');
							
							echo $this->Form->input('username', array('action' => 'change','type' => 'text', 'class' => 'form-control', 'disabled'=>'true' ));
							
							echo $this->Form->input('password', array('type' => 'password', 'class' => 'form-control', 'label' => 'Password lama', 'required'=>'true' ));
							echo $this->Form->input('newpassword', array('type' => 'password', 'class' => 'form-control', 'label' => 'Password baru', 'required'=>'true' ));
							echo $this->Form->input('cnewpassword', array('type' => 'password', 'class' => 'form-control', 'label' => 'Ulangi password baru', 'required'=>'true' ));
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
													'onclick' => 'location.href=\'/projects/bisikq/admins/index\''
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
