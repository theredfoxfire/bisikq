<?php
	App::import("Model", "Replythread");
	App::import("Model", "Threadrate");
	$reply = new Replythread();
	$rate = new Threadrate();
	
	if($isAuth == 1){
	
	<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">BISIKQ Administrator</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><?php echo $this->Html->link("<i class='glyphicon glyphicon-user'></i> Admin", array('controller'=>'admins', 'action' => 'index'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link('Logout', array('controller' => 'admins', 'action' => 'logout')); ?></li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">
<div class="row">
	<div class="sidebar col-sm-3">
      
     <ul class="nav nav-pills nav-stacked">
        
        <li><?php echo $this->Html->link("<i class='glyphicon glyphicon-list-alt'></i> Threads", array('controller'=>'threads', 'action' => 'index'), array('escape' => false)); ?></li>
        <li class="active"><?php echo $this->Html->link("<i class='glyphicon glyphicon-briefcase'></i> Categories", array('controller'=>'categories', 'action' => 'adminindex'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link("<i class='glyphicon glyphicon-link'></i> Reply Threads", array('controller'=>'replythreads', 'action' => 'index'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link("<i class='glyphicon glyphicon-signal'></i> Thread Rates", array('controller'=>'threadrates', 'action' => 'index'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link("<i class='glyphicon glyphicon-book'></i> Reported Threads Reply", array('controller'=>'threadreports', 'action' => 'index'), array('escape' => false)); ?></li>
      </ul> 
      
  	</div><!-- /col-3 -->
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
                      	<h4>Edit Category</h4>
                      	</div>
                	</div>
			<div class="panel-body">

                    <?php echo $this->Form->create('Category');?>
                       
                        <div class="control-group">
                          <div class="controls">
                           <?php
						   echo $this->Form->input('id');
						   echo $this->Form->input('name');
						   echo $this->Form->input('is_publish');
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
<footer class="text-center">Copyright ⓒ 2014 BISIKQ. All Rights Reserved</footer>

<div class="modal" id="addWidgetModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Widget</h4>
      </div>
      <div class="modal-body">
        <p>Add a widget stuff here..</p>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->
		
	}else{
		
<?php
	}
?>
