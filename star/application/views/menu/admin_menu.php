
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
       <div id="banner">        
        	<div id="logo">
        		<?php $image_details = array(
										'src'=>'assets/images/basic-logo.png',
										'alt'=>'logo'
										);
					  
				echo anchor('main/admin', img($image_details));
				?>
        	
        		</div> 
        </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
        <li class="active"><?php echo anchor('main/admin', 'Home'); ?></li>
        
        <li> <?php echo anchor('tourplan/view_staff', 'Tour Plan'); ?></li> 
         <li> <?php echo anchor('contributing/view_staff', 'Doctors Contribution'); ?></li> 
         <li> <?php echo anchor('secondary/view_staff', 'Secondary Sales'); ?></li> 
       
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Others<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
            	
            	<?php echo anchor('admin_staff_operation/add_staff', 'New Staff'); ?>
            </li>
               <li class="divider"></li>
            
           <li>
            	
            	<?php echo anchor('doctor/add_doctor', 'Doctor'); ?>
            </li>
             <li class="divider"></li>
              
              <li>
              	<?php echo anchor('admin_operations/add_designation', 'Add Designations'); ?>
              </li>
              <li class="divider"></li>
              <li>
              	<?php echo anchor('news/add_news', 'Notification'); ?>
              	</li>
              	 <li class="divider"></li>
              <li>
              	<?php echo anchor('product/add_product', 'New Products'); ?>
              	</li>	
              	<li class="divider"></li>
              <li>
              	<?php echo anchor('admin_operations/add_place', 'New Place'); ?>
              </li>	
              	<li class="divider"></li>
              <li>
              	<?php echo anchor('admin_operations/set_km', 'Set Kilometer'); ?>
              </li>	
          </ul>
        </li>
         <!-- <li><a href="report.php">View Report</a></li>
         <li><a href="exam_valuation.php">Exam Valuation</a></li> -->
       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">View<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
            	
            	 <?php echo anchor('report/view_daily', 'Daily Report'); ?>
            </li>
            
              <li class="divider"></li>
            
            
             <li><?php echo anchor('report/view_monthly', 'Expense Statement'); ?></li>
                  <li class="divider"></li>
             <!--     
                  <li><a href="#">Tour Plans</a></li>
                     <li class="divider"></li>
                     
                  <li><a href="#">Doctors Contribution</a></li>
                     <li class="divider"></li>
              <li><?php echo anchor('product/view_product', 'Products'); ?></li>
              
             -->
                   
                  
           <li>
            	<?php echo anchor('admin_operations/view_designation', 'View Designation'); ?>
            	 
            </li>
            <li class="divider"></li>
                  
           <li>
            	<?php echo anchor('staff/view_staff', 'View Staff'); ?>
            	 
            </li>
            
             <li class="divider"></li>
                  
           <li>
            	<?php echo anchor('doctors/view_doctors', 'View Doctors'); ?>
            	 
            </li>
             <li class="divider"></li>
                  
           <li>
            	<?php echo anchor('admin_operations/view_place', 'View Places'); ?>
            	 
            </li>
               
          </ul>
        </li> 
      </ul>
      
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#" id="link" data-toggle="modal" data-target="#changePassword">Change Password</a></li>
            <li class="divider"></li>
           <li>
            	
            	<?php echo anchor('login/logout', 'Log Out'); ?>
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<form name="myForm" id="myForm">
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog" style="width: 327px;">
        <div class="modal-content">
          <!--Model Header Section start-->
          <p class="alert alert-danger" id="pwdmissmatch" style="display: none;">
                	Invalid username/password..!
                </p>
                <p class="alert alert-success" id="pwdmatch" style="display: none;">
                    Password changed....!
                </p>  
          <!--Model header Section end-->
          <div class="modal-body">
            	<div>
						<!--<label>Username</label>-->
                    <div id="username" class="form-group has-feedback">
                      <label class="control-label" for="txtUname">Username</label>
                      <input type="text" class="form-control" name="txtUname" id="txtUname" autocomplete="off" 
                      placeholder="Username" tabindex="1" required="required" title="Username">
                    </div>
                    <div id="password" class="form-group has-feedback">
                      <label class="control-label" for="txtCPassword">Current Password</label>
                      <input type="password" class="form-control" name="txtCPassword" id="txtCPassword" autocomplete="off" 
                      placeholder="Current Password" tabindex="1" required="required" title="Password">
                    </div>
                    <div id="npassword" class="form-group has-feedback">
                      <label class="control-label" for="txtNPassword">New Password</label>
                      <input type="password" class="form-control" name="txtNPassword" id="txtNPassword" autocomplete="off" 
                      placeholder="New Password" tabindex="2" required="required" title="New Password">
                    </div>
                    <div id="rpassword" class="form-group has-feedback">
                      <label class="control-label" for="txtRNPassword">Retype Password</label>
                 
                      <input type="password" class="form-control" name="txtRNPassword" id="txtRNPassword" autocomplete="off" 
                      placeholder="Retype Password" tabindex="3" required="required" title="Retype Password">
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="modal-close">Close</button>
            		<button type="button" class="btn btn-primary pull-right" id="modal-update" 
                            onclick="doAction()">
                        Update Password</button>
               	</div>
          </div>
          
        </div>
      </div>
</div></form>
<script src="<?php echo base_url()."/assets/"?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."/assets/"?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."/assets/"?>js/jquery.min.js"></script>
<script src="<?php echo base_url()."/assets/"?>js/dropdown.js"></script>
<script>
    $('#link').click(function(e) {
        $('#pwdmissmatch').hide();
        $('#pwdmatch').hide();
        $('#txtUname').val('');
        $('#txtCPassword').val('');
        $('#txtNPassword').val('');
    });
    function doAction() {
    	//alert('hi');
    	var uname= $('#txtUname').val();
       	var pass = $('#txtCPassword').val();
       	var npass = $('#txtNPassword').val();
       	var rnpass = $('#txtRNPassword').val();
          jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/main/change",
				dataType: 'text',
				data: { 
					    email : uname,
						password : pass	,
						new_pass : npass,
						retype : rnpass 			 
					 },
				success: function(res){
					//alert(res);
					
					if(res=='0')
					 {
                   	 $('#pwdmatch').hide();
                   	 $('#pwdmissmatch').show('slow');
                	}
                	else if(res=='1')
                	{
                	 $('#pwdmissmatch').hide();
                     $('#pwdmatch').show('slow');	
                	}
					
				}
			});
            
	}
	
	
	 //alert("Result : "+msg);
              /*  if($.trim(msg)=='1') {
                    $('#pwdmissmatch').hide();
                    $('#pwdmatch').show('slow');	
                } else if($.trim(msg)=='0') {
                    $('#pwdmatch').hide();
                    $('#pwdmissmatch').show('slow');
                }*/
</script>