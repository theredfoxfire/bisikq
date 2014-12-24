
    <div class="main-right col-sm-9">
		<div class="row">
			
		<div class="col-md-12">
			<div class="col-md-12">
				
              	<div class="panel panel-default">
                	<div class="panel-heading">
                      	<div class="panel-title">
                  		<i class="glyphicon glyphicon-wrench pull-right"></i>
                      	<h4>Post New Category</h4>
                      	</div>
                	</div>
			<div class="panel-body">

                      <form class="form form-vertical" method="post" action="/projects/bisikq/categories/add">
                       
                        <div class="control-group">
                          <label>Name</label>
                          <div class="controls">
                           <input type="text" name="data[Category][name]" class="form-control" placeholder="Enter Category Name" required>
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
