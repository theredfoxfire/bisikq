
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
                      	<h4> New Admin</h4>
                      	</div>
                	</div>
			<div class="panel-body">

                      <form class="form form-vertical" method="post" action="/projects/bisikq/admins/add">
                       
                        <div class="control-group">
                          <label>Name</label>
                          <div class="controls">
                           <input type="text" name="data[Admin][username]" class="form-control" placeholder="Enter Username">
                          </div>
                        </div>      
						
						<div class="control-group">
                          <label>Password</label>
                          <div class="controls">
                           <input type="password" name="data[Admin][password]" class="form-control" placeholder="Enter Username">
                          </div>
                        </div>
						<?php
						$options = array('1'=>'Admin','2'=>'Others');
						$attributes = array('div' => 'input', 'type' => 'radio', 'options' => $options, 'default' => '1', 'label' => 'Hak Akses');

						echo $this->Form->input('priviledge',$attributes);
                        ?>
                        <div class="control-group">
                          	<label></label>
                        	<div class="controls">
                        	<button type="submit" class="btn btn-primary">
                              Post
                            </button>
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
