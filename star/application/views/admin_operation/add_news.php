
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
                          New Notification
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo form_open_multipart('news/do_upload'); ?>
                                    
                                    	 <div class="form-group">
                                            <label for="tile">Title</label>
                                            <input class="form-control" placeholder="Enter the title" required="" name="title" id="title" type="text">
                                        </div>
                                      <div class="form-group">
                                            <label for="details">Details</label>
                                            <textarea class="form-control" rows="3" required="" name="details" id ="details"></textarea>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input class="form-control" type="file"  name="file" id ="file" />
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
  								 Notification is saved
								 </div>
								 <?php }
									else if($val==0)
									{
									?>
									<div class="alert alert-info" role="alert">
 								 <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
 								 <span class="sr-only">Information:</span>
  								 You can enter the notification
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