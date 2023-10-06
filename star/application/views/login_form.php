
   <div class="container">
   	<br /><br /><br /><br /><br />
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"> <strong class="">Login</strong>

                </div>
                <div class="panel-body">
                  <?php echo validation_errors('<p style="color: red; font-style: italic;">');?> 
                  	<?php echo '<p style="color: red; font-style: italic;">'.$login_error.'</p>'; ?>
                    <?php
                    $attributes = array('class'=>"form-horizontal", 'role'=>'form');
                    echo form_open("login/validate_credentials", $attributes); 
                    ?>   
                        <div class="form-group">
                        	<?php
                        		$attributes = array("class"=>"col-sm-3 control-label");
								echo form_label('Email', 'email', $attributes);
                        	?>
                            
                            <div class="col-sm-9">
                            	
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="" >
                            </div>
                        </div>
                        <div class="form-group">
                        	<?php
                        		$attributes = array('class'=>'col-sm-3 control-label');
								echo form_label('Password', 'password', $attributes);
                        	?>
                            
                            <div class="col-sm-9">
                            	<?php
                            		$data = array(
												'class'=>'form-control',
												'id'=>'password',
												'name'=>'password',
												'placeholder'=>'Password',
												'required'=>'',
												'value'=>""
											);
											echo form_password($data);
                            	?>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">                                    
                                    	<?php
                                    		$data = array('name'=>'remember','id'=>'remember');
											echo form_label(form_checkbox($data)."Remember me"); 
                                    	?>                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                           
                            	<?php
                            		$data = array('name'=>'Sign In', 'class'=>'btn btn-success btn-sm','type'=>'submit');
									echo form_button($data, 'Sign In')." ";
									$data = array('class'=>'btn btn-default btn-sm', 'type'=>'reset');
									echo form_button($data, 'Reset');		
                            	?>                                                            
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
           <!--     <div class="panel-footer">Not Registered? 
                	<?php echo anchor('login/signup', 'Create Account');?>
             </div>-->
                
            </div>
        </div>
    </div>
</div>
