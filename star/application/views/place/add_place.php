
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
                          New Place
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo form_open_multipart('admin_operations/insert_place'); ?>
                                    
                                    	 <div class="form-group">
                                            <label for="tile">Name</label>
                                            <input class="form-control" placeholder="Enter the place name" required="" name="name" id="name" type="text">
                                        </div>
                                      <div class="form-group">
                                            <label for="details">District</label>
                                            <select class="form-control" required="" name="district" id="district">
      											<option value="">
													&lt;--Select--&gt;
												</option>
                                        
                                           
                                            	
												<option>Alappuzha</option>
												<option>Ernakulam</option>
												<option>Idukki</option>
												<option>Kannur</option>
												<option>Kasaragod</option>
												<option>Kollam</option>
												<option>Kottayam</option>
												<option>Kozhikode</option>
												<option>Malappuram</option>
												<option>Palakkad</option>
												<option>Pathanamthitta</option>
												<option>Thiruvananthapuram</option>
												<option>Thrissur</option>
												<option>Wayanad</option>
                                           
                                           </select>
                                        </div>
                                    
                                        	 <div class="form-group">
                                            <label for="tile">Headquarter</label>
                                            <input class="form-control" value="hq" name="hq" id="hq" type="checkbox">
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
  								 New place is added
								 </div>
								 <?php }
									else if($val==0)
									{
									?>
									<div class="alert alert-info" role="alert">
 								 <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
 								 <span class="sr-only">Information:</span>
  								 You can enter the place details
								 </div>
									<?php	
									}
									else if($val==1062)
									{
									?>
									<div class="alert alert-danger" role="alert">
 								 <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
 								 <span class="sr-only">Information:</span>
  								 Already entered that place.
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