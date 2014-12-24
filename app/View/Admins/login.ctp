<div id="wrap" class="wrap-login">
<div class="login panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>Login Admin</h4>
            </div>
        </div>
        <div class="panel-body">
        <div class="alert alert-danger" role="alert">
        <?php
			echo $this->Session->flash('auth');
			echo $this->Session->flash();
		?>
		</div>
            <form class="form form-vertical" action="/projects/bisikq/admins/login" id="AdminLoginForm" method="post" accept-charset="utf-8">
            <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
                <div class="control-group">
                    <label>Username</label>
                    <div class="input-group">
					  <span class="input-group-addon"><i class="fa fa-user"></i></span>
					  <input type="text" class="form-control" name="data[Admin][username]" maxlength="50" type="text" id="AdminUsername" required="required" placeholder="Username">
					</div>
                </div><br />  
                <div class="control-group">
                    <label>Password</label>
                    <div class="input-group">
					  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
					  <input type="password" class="form-control" placeholder="Password" name="data[Admin][password]" type="password" id="AdminPassword" required="required">
					</div>
                </div>
                    
				<div class="control-group">
                    <label></label>
                    <div class="controls">
						<button type="submit" class="btn btn-primary">
                            Log in
                        </button>
                    </div>
                </div>   
                        
            </form>
                
                
                  </div><!--/panel content-->
                </div><!--/panel-->
      </div>