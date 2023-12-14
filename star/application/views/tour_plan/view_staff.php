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
            	<?php echo form_open("tourplan/view_tourplan_report")?>
        
        
        <div class="col-sm-1">
      <label for="name" class="control-label">Month</label>
      </div>
        <div class="col-sm-8">
	<div ng-controller="DatepickerDemoCtrl">
    
    <div class="row">
                   <div class="col-md-4">
         <p class="input-group">
              <input type="text" required="" class="form-control col-md-12" datepicker-popup="MMM-yyyy" 
              ng-model="dt" is-open="opened" min="minDate" max="today" 
              datepicker-options="dateOptions" date-disabled="disabled(date, mode)" 
              ng-required="true" close-text="Close"  name ="date" id="date"/>
              <span class="input-group-btn">
                <button class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
            </p>
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

