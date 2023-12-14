<?php date_default_timezone_set('Asia/Kolkata');?>
  


  
  <div id="wrapper">
<div id="page-wrapper">
	
	
	
	<?php 
	$cdate= date('Y-m-d');
	$days_ago = date('Y-m-d', strtotime('-10 days', strtotime($cdate)));
	
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
                                    
                                    foreach($daily as $row)
									{
										$date = $row->date;
										$place_id = $row->place_id;
										$place = $row->place;
										$worked_with = $row->worked_with;
										//$station = $row->station;
										if($this->session->userdata('hq')==$place)
										{
										$station='HQ';
										}
										else if($this->session->userdata('district')==$row->district)
										{
										$station='ExHQ';
										}
										else
											 {
												$station='OS';			
											}
														$km = $row->km;
										 ///$km=substr($km, 0, strrpos($km, ' '));
										$doctors_visited = $row->doctors_visited;
										$chemist = $row->chemist;
										$other_expense=$row->other_expense;
										$expense_reason = $row->expense_reason;
										$leave_reason = $row->leave_reason;
										
										$daily_id= $row->daily_id;
									}
	
									$temp = $doctors_visited;
									$temp = str_replace(',', '', $temp);
									$doct = explode('/', $temp);
									
									
				
			
		
                                    
                                    $attributes = array('id' => 'myform');
                                     echo form_open('report/update_daily', $attributes); ?>
                                    <input type="hidden" id="combo"  value="<?php echo $worked_with ?>"/>
                                     <input type="hidden" id="daily_id"  name="daily_id" value="<?php echo $daily_id; ?>"/>
                                    <input type="hidden" id="doct" value="<?php echo implode(" ", $doct) ?>"/>
                                     	 <div class="form-group">
                                            <label for="date">Date</label>
                                            <input class="form-control" placeholder="Select the date" required="" value="<?php echo $date; ?>" readonly="" onblur="if(this.value<document.getElementById('days_ago').value){ alert('Invalid date'); this.value='';}" name="date" id="date" type="date">
                                        </div>
                                         <div class="form-group">
                                            <label for="work">Town Worked</label>
                                            <input  class="form-control" placeholder="Enter Work site"  name="work" id="work" type="text"   value="<?php echo $place; ?>" required=""  readonly="">
                                      		<input  class="form-control"   name="place_id" id="place_id" type="hidden" value="<?php echo $place_id; ?>"  required="">
                                      		<label id="district"></label>
                                        </div>
                                        
                
                 						<div class="form-group">
                                         
                                         <label>Station</label>   <input placeholder="Station"  value="<?php echo $station; ?>" readonly="" name="station" id="station" type="text" required="" >
                                      	<label>KM</label>	   <input placeholder="km"  name="km" readonly="" value="<?php echo $km; ?>" id="km" type="text" required="" >
                                        </div>
                						
                                        <div class="form-group">
                                            <label for="doctor">Doctors</label>
                                            <table id="doctor_table" cellpadding="10" cellspacing="10">
                                            	
                                            	
                                            </table>
                                        </div>
                                         
                                   		
                                   		<div class="form-group">
                                            <label for ="chemist">Chemist Name</label>
                                            <textarea class="form-control" rows="3" name="chemist" id ="chemist"><?php echo $chemist; ?></textarea>
                                            
                                            <p class="help-block">Select the designation</p>
                                        </div>
                                   		
                                   		
                                    
                                         <div class="form-group">
                                            <label for ="designation">Worked With</label>
                                           	<select class="form-control"   name="designation" id="designation">
                                            <option value="">&lt;--Select--&gt;</option>
                                            <?php foreach($desi as $row){ ?>
                                            	
												<option  value="<?php echo $row->designation_id; ?>">
													<?php echo $row->designation_name; ?>
												</option>
                                           <?php }?>
                                           </select>
                                            
                                            <p class="help-block">Select the designation</p>
                                        </div>
                                    
                                    
                                    
                                      <div class="form-group">
                                    
                                        <label for="other">Other Expense</label>
                                            <input  class="form-control" placeholder="Enter Other expense" value="<?php if($other_expense!=0)echo $other_expense; ?>"  name="other_expense" id="other_expense" type="number">
                                      		
                                        </div>
                                        
                                         <div class="form-group">
                                    
                                        <label for="other">Details of  other expense</label>
                                              <textarea class="form-control" rows="3" name="expense_reason"  id ="expense_reason"><?php echo $expense_reason; ?></textarea>
                                      		
                                        </div>
                                    
                                    
                                   		
                                   <input type="hidden" id="check" name="check"  />
                             
                                                                  
                                   
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
								 	
								 	
								 	 <?php echo form_open('report/update_leave'); ?>
								 	     <input type="hidden" id="daily_id1"  name="daily_id1" value="<?php echo $daily_id; ?>"/>
								 	 <div class="form-group">
                                            <label for="date">Leave Date</label>
                                            <input class="form-control" value="<?php echo $date; ?>" placeholder="Select the date" required="" onchange="" onblur="if(this.value<document.getElementById('days_ago').value){ alert('Invalid date'); this.value='';}" name="date" type="date">
                                        </div>
                                         <div class="form-group">
                                            <label for="work">Leave Reason</label>
                                            <textarea  class="form-control" placeholder="Enter the reason"   name="reason" required=""><?php echo $leave_reason;?></textarea>
                                      		
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
			var str = $("#doct").val();    	
     		var doct = str.split(' ').map(Number);
     		if($('#combo').val()!=0)
     			$('#designation').val($('#combo').val());
     		
     		var place = $('#place_id').val();	
		 
		jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/retrive/getdoctor",
				dataType: 'json',
				data: { place: place 
										 
					 },
				success: function(res){
				//	alert(res);
					$('#doctor_table').empty();
					//alert(JSON.stringify(res));
					
					
					var object = eval(res);
					//alert(object.district);
				//	$("#district").text(object.district);
					//$("#station").val(object.station);
					//$("#km").val(object.km);
					//$("#place_id").val(object.place_id);
				for(var i=0; i< object.doctor.length; i++)
    			  {
					//var object = eval(res);
					
					$("#doctor_table").append("<tr><td><input type='checkbox' id="+object.doctor[i].doctor_id+"/>"+object.doctor[i].name+"</td><td>--"+object.doctor[i].specialized+"</td></tr>");
					//$("#doctor_table").append("<tr><td><input type='checkbox' id="+object[i].doctor_id+"/>"+object[i].name+"</td><td>--"+object[i].specialized+"</td></tr>");
				  }
				}
			});
     		
     		
     });
     
     
      
	$("#work").keyup(function(e){
		if(e.which== 13)
		{
			
		var place = $('#work').val();	
		 
		jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/retrive/getdoctor",
				dataType: 'json',
				data: { place: place 
										 
					 },
				success: function(res){
				//	alert(res);
					$('#doctor_table').empty();
					//alert(JSON.stringify(res));
					
					
					var object = eval(res);
					//alert(object.district);
					$("#district").text(object.district);
					$("#station").val(object.station);
					$("#km").val(object.km);
					$("#place_id").val(object.place_id);
				for(var i=0; i< object.doctor.length; i++)
    			  {
					//var object = eval(res);
					$("#doctor_table").append("<tr><td><input type='checkbox' id="+object.doctor[i].doctor_id+"/>"+object.doctor[i].name+"</td><td>--"+object.doctor[i].specialized+"</td></tr>");
					//$("#doctor_table").append("<tr><td><input type='checkbox' id="+object[i].doctor_id+"/>"+object[i].name+"</td><td>--"+object[i].specialized+"</td></tr>");
				  }
				}
			});
		
		}	
    });
	
	$("#myform").submit(function(){
		var checkedValues = $('input:checkbox:checked').map(function() {
    return this.id;
		}).get();
		$("#check").val(checkedValues);
		if(checkedValues=='')
		{
			alert('Please Add Doctor')
			return false;
		}
		//alert(checkedValues);
			});
</script>
       
        <!-- /#page-wrapper -->