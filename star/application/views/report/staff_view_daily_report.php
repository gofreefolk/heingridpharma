  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker.css">
  <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
  <div id="wrapper">
<div id="page-wrapper">
<div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Welcome Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
              
            </div>
            <center>
            	<?php echo form_open("staff_report/staff_view_daily_report_print")?>
        
        
        <div class="col-sm-1">
      <label for="name" class="control-label">Day</label>
      </div>
        <div class="col-sm-8">
	<div ng-controller="DatepickerDemoCtrl">
    
    <div class="row">
                   <div class="col-md-4">
         <p class="input-group">
              <input type="date" required="" class="form-control col-md-12"  name ="date" id="date"/>
                         </p>
            </div>
            
            <div class="col-sm-8">
            	<div class="col-sm-1">
     
      <div class="col-sm-8">
      		
                                            
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
//$('#date').datepicker({startView : 'year', format : 'dd/mm/yyyy', enableYearToMonth: true, enableMonthToDay : false});
//$('#c').datepicker({startView : 'decade', format : 'yyyy', enableYearToMonth : false, enableMonthToDay : false,});
</script>

                         	 
<div class="table-responsive">
	 <?php if(isset($designation_details)) 
           {
           ?>
      <table class="table table-bordered">
      	<caption>Designations</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Basic Salary</th>
            <th>Details</th>
            <th>Update</th>
            
          </tr>
        </thead>
        <tbody>
        	<?php 
        	$count=1;
        	foreach ($designation_details as $value ) { ?>
				
		
          <tr id="<?php echo $value->designation_id;  ?>">
            <th scope="row"><?php echo $count++; ?></th>
            <td> <?php echo $value->designation_name; ?></td>
            <td> <?php echo $value->basic_pay; ?></td>
            <td> <?php echo $value->details; ?></td>
            <td> <?php echo anchor('admin_operations/view_selected_designation/'.$value->designation_id, 'Click here to change')?></td>
          </tr>
        <?php	}?> 
        </tbody>
      </table>
      <?php } 
else{
		
		
	//echo "No datas";
}
      ?>
    </div><!-- /.table-responsive -->
    </div>
    </div>

