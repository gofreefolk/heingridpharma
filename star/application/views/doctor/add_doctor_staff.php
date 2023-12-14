
  
  <div id="wrapper">
<div id="page-wrapper">
	
	
	
	
	
	
	
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Welcome User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="position: relative; left: 110px">
                <div class="col-lg-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Add New Doctor 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo form_open('doctor/insert_doctor_staff'); ?>
                                    
                                    	 <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control" placeholder="Enter the name" required="" name="name" id="name" type="name">
                                        </div>
                                         <div class="form-group">
                                            <label for="name">Mobile</label>
                                            <input class="form-control" placeholder="Enter the mobile no"  name="mobile" id="mobile" type="number">
                                        </div>
                                        
                
                                        <div class="form-group">
                                            <label for="eamil">Email</label>
                                            <input class="form-control" placeholder="Enter the email" name="email" id="email" type="email">
                                        </div>
                                   
                                    
                                        <div class="form-group">
                                            <label for="hq">Place</label>
                                            <select class="form-control" required="" name="hq" id="hq">
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
                                            
                                        </div>
                                    
                                   		
                                   
                         <div class="form-group">
                                            <label for="Specialized">Specialized</label>
                                           	<select class="form-control" required="" name="specialized" id="specialized">
                                           
					<option value="">&lt;--Select--&gt;</option>
					<option>Audiologists</option>
					<option>Allergist</option>
					
					<option>Andrologists</option>
					<option>Anesthesiologists</option>
					<option>Cardiologist</option>
					<option>Dentist</option>
					<option>Dermatologists</option>
					<option>Endocrinologists</option>
					<option>Epidemiologists</option>
					<option>Family Practician</option>
					<option>Gastroenterologists</option>
					
					<option>Gynecologists</option>
					<option>Hematologists</option>
					<option>Hepatologists</option>
					<option>Immunologists</option>
					<option>Infectious Disease Specialists</option>
					<option>Internal Medicine Specialists</option>
					<option>Internists</option>
					<option>Microbiologists</option>
					<option>Neonatologist</option>
					<option>Nephrologist</option>
					<option>Neurologist</option>
					<option>Neurosurgeons</option>
					<option>Obstetrician</option>
					<option>Oncologist</option>
					<option>Ophthalmologist</option>
					<option>Orthopedic Surgeons</option>
					<option>ENT specialists</option>
					<option>Perinatologist</option>
					<option>Paleopathologist</option>
					<option>Parasitologist</option>
					<option>Pathologists</option>
					<option>Pediatricians</option>
					<option>Physiologists</option>
					<option>Physiatrist</option>
					<option>Podiatrists</option>
					<option>Psychiatrists</option>
					<option>Pulmonologist</option>
					<option>Radiologists</option>
					<option>Rheumatologsists</option>
					<option>Surgeons</option>
					<option>Urologists</option>
					<option>Emergency Doctors</option>
					<option>Veterinarian</option>
					
					
				</select>
	
                                           </select>
                                            
                                            <p class="help-block">Select the specialization</p>
                                        </div>    
                                        
                                        <div class="form-group">
                                            <label for="firm">Hospital/Lab Name</label>
                                            <input class="form-control" required=""  name="firm" id ="firm" />
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
  								 New doctor is added
								 </div>
								 <?php }
									else if($val==0)
									{
									?>
									<div class="alert alert-info" role="alert">
 								 <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
 								 <span class="sr-only">Information:</span>
  								 You can enter the details of new doctor
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