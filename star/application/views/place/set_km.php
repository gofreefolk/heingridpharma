
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
                          Distance
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo form_open_multipart('admin_operations/update_km'); ?>
                                    
                                    	 <div class="form-group">
                                            <label for="tile">Source</label>
                                            <select class="form-control" required="" name="source" id="source">
      											<option value="">
													&lt;--Select--&gt;
												</option>
                                        		<?php 
                                        		
                                        		foreach($source as $value)
                                        		{
                                        			?>
                                        			<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                        			<?php
                                        		}
                                        		?>
                                           
                                            	
												
                                           
                                           </select>
                                        </div>
                                      <div class="form-group">
                                            <label for="details">Destination</label>
                                            <select class="form-control" required="" name="destination" id="destination">
      											<option value="">
													&lt;--Select--&gt;
												</option>
                                        
                                           <?php 
                                        		
                                        		foreach($destination as $value)
                                        		{
                                        			?>
                                        			<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                        			<?php
                                        		}
                                        		?>
                                           
                                           
                                           </select>
                                        </div>
                                    
                                        	 <div class="form-group">
                                            <label for="tile">Kilometers</label>
                                            <input class="form-control" placeholder="Enter the place name" required="" name="km" id="km" type="number">
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
  								 Distance is updated
								 </div>
								 <?php }
									else if($val==0)
									{
									?>
									<div class="alert alert-info" role="alert">
 								 <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
 								 <span class="sr-only">Information:</span>
  								 You can enter the distance
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
      
      <script>
      
     $(document).ready(function(){
     	$("#source").change(function(){
     		var s=$(this).val();
     		var d=$("#destination").val();
     			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/admin_operations/get_km",
				dataType: 'json',
				data: { source: s,
						destination: d 
										 
					 },
				success: function(res){
					
					var object = eval(res);
					
					$("#km").val(object.km);
					
					
					
				}
			});
     		
     	});
     	$("#destination").change(function(){
     		var d=$(this).val();
     		var s=$("#source").val();
     			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/admin_operations/get_km",
				dataType: 'json',
				data: { source: s,
						destination: d 
										 
					 },
				success: function(res){
					
					var object = eval(res);
					//alert(object.km);
					$("#km").val(object.km);
					
					
					
				}
			});
     		
     	});
     }) ;
     
      </script>
       
        <!-- /#page-wrapper -->