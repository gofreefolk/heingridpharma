  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker.css">
  <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
  <div id="wrapper">
<div id="page-wrapper">
<div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Select a staff</h1>
                </div>
                <!-- /.col-lg-12 -->
              
            </div>
            <center>
            	<?php echo form_open("contributing/view_contributing_report")?>
        
        
        
        <div class="col-sm-2">
      <label for="name" class="control-label"> Select the Year</label>
      </div>
        <div class="col-sm-8">
	<div ng-controller="DatepickerDemoCtrl">
    
    <div class="row">
                   <div class="col-md-4">
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
            
            <div class="col-sm-8">
            	
            	
            	
            	<div class="col-sm-1">
      <label for="name" class="control-label">Name</label>
      
      </div>
      <div class="col-sm-8">
      		<select class="form-control" required="" name="staff" id="staff">
      											<option value="">
													&lt;--Select--&gt;
												</option>
                                        
                                            <?php foreach($staff as $row){ ?>
                                            	
												<option value="<?php echo $row->staff_id; ?>">
													<?php echo $row->name; ?>
												</option>
                                           <?php }?>
                                           </select>
                                            
                  </div>
                  <div class="col-sm-2" >
                  <button type="submit" class="btn btn-default">Submit</button>
                  	
                  </div>
    </div>
    </div>
    </div>
          
          
          
                   </form>
                   </center>
        
</div>
<script type="text/javascript">
//$('#a').datepicker({startView : 'month', format : 'dd/mm/yyyy', enableYearToMonth: true, enableMonthToDay : true});
$('#date').datepicker({startView : 'year', format : 'mm/yyyy', enableYearToMonth: true, enableMonthToDay : false});
//$('#c').datepicker({startView : 'decade', format : 'yyyy', enableYearToMonth : false, enableMonthToDay : false,});
</script>

                         	 

    </div>
    </div>

