  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker.css">
  <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
  <div id="wrapper">
  
<div id="page-wrapper" class="col-md-12" align="center">
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
              
            </div>
           
            	<?php echo form_open("report/staff_view_monthly_report_view_edit")?>
        
        <div class="row">
        <div class="col-sm-1" >
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
            <div class="col-sm-2" >
                  <button type="submit" class="btn btn-default">Submit</button>
                  	
                  </div>
     	
    </div>
    </div>
          
          
          
                   </form>
                  
        
</div>
<script type="text/javascript">
//$('#a').datepicker({startView : 'month', format : 'dd/mm/yyyy', enableYearToMonth: true, enableMonthToDay : true});
$('#date').datepicker({startView : 'year', format : 'mm/yyyy', enableYearToMonth: true, enableMonthToDay : false});
//$('#c').datepicker({startView : 'decade', format : 'yyyy', enableYearToMonth : false, enableMonthToDay : false,});
</script>

                         	 

    </div>
    </div>

