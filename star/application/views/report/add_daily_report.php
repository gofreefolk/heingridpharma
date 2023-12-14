<?php date_default_timezone_set('Asia/Kolkata');?>
  

  


  
  <div id="wrapper">
<div id="page-wrapper">
	
	
	
	<?php 
	$cdate= date('Y-m-d');
	$days_ago = date('Y-m-d', strtotime('-90 days', strtotime($cdate)));
	
	//echo "<br/>". $days_ago;
	?>
	<input type="hidden"  id='days_ago' value="<?php echo $days_ago?>"  />
	
	
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Welcome user</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row" style="position: relative; left: 110px">
                <div class="col-lg-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Daily Report
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                	
                                    <?php
                                    $attributes = array('id' => 'myform');
                                     echo form_open('report/insert_daily', $attributes); ?>
                                    
                                    	 <div class="form-group">
                                            <label for="date">Date</label>
                                            <input class="form-control" placeholder="Select the date" required="" onblur="if(this.value<document.getElementById('days_ago').value){ alert('Invalid date'); this.value='';}" name="date" id="date" type="date">
                                        </div>
                                         <div class="form-group">
                                            <label for="work">Town Worked</label>
                                            <select class="form-control" required="" name="work" id="work">
      											<option value="">
													&lt;--Select--&gt;
												</option>
                                        		<?php 
                                        		
                                        		foreach($place as $value)
                                        		{
                                        			?>
                                        			<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                        			<?php
                                        		}
                                        		?>
                                           
                                            	
												
                                           
                                           </select>
                                           <input type="hidden" id="place" name="place" />
                                      		<label id="district"></label>
                                        </div>
                                        
                
                 						<div class="row">
                 							    
                                      		   
                                      
                                          <div class="col-md-3"><label>Station</label></div> 
                                          <div class="col-md-3"><input placeholder="Station" class="form-control" style="width: 100px" name="station" id="station" type="text" required="" readonly="" ></div>
                                           <div class="col-md-2"><label>KM</label></div> 
                                           <div class="col-md-3"><input placeholder="km" class="form-control" style="width: 50px" value="" name="km" id="km" type="text"  readonly="" required></div>
                                         </div>
                						
                                        <div class="form-group">
                                            <label for="doctor">Doctors</label>
                                            <table id="doctor_table" cellpadding="10" cellspacing="10">
                                            	
                                            	
                                            </table>
                                        </div>
                                         
                                   		
                                   		<div class="form-group">
                                            <label for ="chemist">Chemist Name</label>
                                            <textarea class="form-control" rows="3" name="chemist" id ="chemist"></textarea>
                                            
                                            <p class="help-block">Select the designation</p>
                                        </div>
                                   		
                                   		
                                    
                                         <div class="form-group">
                                            <label for ="designation">Worked With</label>
                                           	<select class="form-control"  name="designation" id="designation">
                                            <option value="">&lt;--Select--&gt;</option>
                                            <?php foreach($desi as $row){ ?>
                                            	
												<option value="<?php echo $row->designation_id; ?>">
													<?php echo $row->designation_name; ?>
												</option>
                                           <?php }?>
                                           </select>
                                            
                                            <p class="help-block">Select the designation</p>
                                        </div>
                                    
                                    
                                    
                                      <div class="form-group">
                                    
                                        <label for="other">Other Expense</label>
                                            <input  class="form-control" placeholder="Enter Other expense"  name="other_expense" id="other_expense" type="number">
                                      		
                                        </div>
                                        
                                         <div class="form-group">
                                    
                                        <label for="other">Detials of  other expense</label>
                                              <textarea class="form-control" rows="3" name="expense_reason" id ="expense_reason"></textarea>
                                      		
                                        </div>
                                    
                                    
                                   		
                                   <input type="hidden" id="check" name="check" />
                             
                                                                  
                                   
                                        <button type="submit" id="submit" class="btn btn-default">Submit</button>
                                        
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
  								 Report is added
								 </div>
								 <?php }
									else if($val==0)
									{
									?>
									<div class="alert alert-info" role="alert">
 								 <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
 								 <span class="sr-only">Information:</span>
  								 You can enter the details of report
								 </div>
									<?php	
									}
									else if($val==2)
									{
									?>
									<div class="alert alert-success" role="alert">
 								 <span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
 								 <span class="sr-only">Saved:</span>
  								 Your leave deails is saved
								 </div>
									<?php	
									} 
								 ?>
								 
								 
								 <div class="alert alert-warning" role="alert">
								 	
								 	
								 	 <?php echo form_open('report/insert_leave'); ?>
								 	 <div class="form-group">
                                            <label for="date">Leave Date</label>
                                            <input class="form-control" placeholder="Select the date" required="" onchange="" onblur="if(this.value<document.getElementById('days_ago').value){ alert('Invalid date'); this.value='';}" name="date" type="date">
                                        </div>
                                         <div class="form-group">
                                            <label for="work">Leave Reason</label>
                                            <textarea  class="form-control" placeholder="Enter the reason"  name="reason" required=""></textarea>
                                      		
                                        </div>
                                        
                                        <button type="submit" id="leave_submit" class="btn btn-default">Submit</button>
                                        
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        
								 	</form>
								 	
								 </div>
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
     	$("#work").change(function(){
     		//$("#place").val($(this).text());
     		var place=$(this).val();
     		jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/retrive/get_station_km_doctors",
				dataType: 'json',
				data: { place: place 
										 
					 },
				success: function(res){
					$('#doctor_table').empty();
					var object = eval(res);
					//alert(res);
					$("#station").val(object.station);
					$("#place").val(object.place);
					if(object.km=="")
					{
						$("#km").val('');
					}
					else
					$("#km").val(object.km);
					
					for(var i=0; i< object.doctor.length; i++)
    				  {
					
					$("#doctor_table").append("<tr><td><input type='checkbox' id="+object.doctor[i].doctor_id+"/>"+object.doctor[i].name+"</td><td>--"+object.doctor[i].specialized+"</td></tr>");
					//$("#doctor_table").append("<tr><td><input type='checkbox' id="+object[i].doctor_id+"/>"+object[i].name+"</td><td>--"+object[i].specialized+"</td></tr>");
					  }
				}
			});
     		
     	});
     }) ;
     
      
	
	
	$("#myform").submit(function(){
		var checkedValues = $('input:checkbox:checked').map(function() {
    return this.id;
		}).get();
		$("#check").val(checkedValues);
		if($("#km").val()=='')
		{
			alert("Kilometer is not added. Please contact admin");
			return false;
		}
		else if(checkedValues=='')
		{
			alert('Please Add Doctor')
			return false;
		}
		else if($("#station").val()=='')
		{
			alert("Station is unknown. Please contact admin");
			return false;
		}
		
		//alert(checkedValues);
			});
</script>
       
        <!-- /#page-wrapper -->