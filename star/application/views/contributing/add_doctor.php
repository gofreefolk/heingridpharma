


  


  
  <div id="wrapper">
<div id="page-wrapper">
	
	
	
	
	
	
	
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Add Doctor</h1>
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
                                    <?php echo form_open('contributing/insert_doctor'); ?>
                                    
                                    	 <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control" placeholder="Enter the name" required="" name="name" id="name" type="name">
                                        </div>         
                                        <div class="form-group">
                                            <label for="firm">Product Rx</label>
                                            <input class="form-control"  name="product" id ="product" />
                                        </div>   
                                        
                                        
                                        
                                        
                                           
    <div class="form-group">
    	<label for="name">Year</label>
                   
        
<?php 
function yearDropdown($startYear, $endYear, $id="year"){ 
    //start the select tag 
    echo "<select class=form-control id=".$id." name=".$id.">"; 
          
        //echo each year as an option     
        for ($i=$startYear;$i<=$endYear;$i++){ 
        echo "<option value=".$i.">".$i."</option>n";     
        } 
      
    //close the select tag 
    echo "</select>"; 
} 
yearDropdown(2005, 2300);
?>

<script>
	$(document).ready(function(){
		var year = new Date().getFullYear();
		$("#year").val(year);
	});
</script>

            
            
           
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