


  
  <div id="wrapper">
<div id="page-wrapper">
	
	
	
	
	
	
	
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Welcome Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="position: relative; left: 110px">
                <div class="col-lg-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Add New Staff
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo form_open('admin_staff_operation/insert_staff'); ?>
                                    
                                    	 <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control" placeholder="Enter the name" required="" name="name" id="name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for ="designation">Designation</label>
                                           	<select class="form-control" required="" name="designation" id="designation">
                                           <option value="">&lt;--Select--&gt; </option>
                                            <?php foreach($desi as $row){ ?>
                                            	
												<option value="<?php echo $row->designation_id; ?>">
													<?php echo $row->designation_name; ?>
												</option>
                                           <?php }?>
                                           </select>
                                            
                                            <p class="help-block">Select the designation</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="eamil">Email</label>
                                            <input class="form-control" placeholder="Enter the email" required="" name="email" id="email" type="email">
                                        </div>
                                   
                                    
                                        <div class="form-group">
                                            <label for="hq">Head Quater</label>
                                            <select class="form-control" required="" name="hq" id="hq">
      											<option value="">
													&lt;--Select--&gt;
												</option>
                                        		<?php 
                                        		
                                        		foreach($hq as $value)
                                        		{
                                        			?>
                                        			<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                        			<?php
                                        		}
                                        		?>
                                           
                                            	
												
                                           
                                           </select>
                                            
                                        </div>
                                    	 <div class="form-group">
                                    	 	 <label for="hq">Date of Joining</label>
                                   			<input class="form-control" required="" name="doj" id="doj" type="date"/>
                                   		</div>
                                       
                                   		
                                   
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                  <br/><br/> <br/><br/> <br/><br/>
                                  <?php if ($val==1){ ?>
                                 <div class="alert alert-success" role="alert">
 								 <span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
 								 <span class="sr-only">Saved:</span>
  								 New Staff is added
								 </div>
								 <?php }
									else if($val==0)
									{
									?>
									<div class="alert alert-info" role="alert">
 								 <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
 								 <span class="sr-only">Information:</span>
  								 You can enter the details of new staff
								 </div>
									<?php	
									}
								 ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
       </div>
      
      
       
        <!-- /#page-wrapper -->