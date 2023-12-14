  <div id="wrapper">
<div id="page-wrapper">
<div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Welcome Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
          
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
            <td>
            	
            	<?php  echo form_open('admin_operations/edit_designation'); ?>
               	<input type="hidden" value="<?php echo $value->designation_id ?>" name="desi_id" />
               	<input type="submit"  value="Edit"/>
               </form>
            	
            	
            </td>
          </tr>
        <?php	}?> 
        </tbody>
      </table>
      <?php } 
else{
	echo "No datas";
}
      ?>
    </div><!-- /.table-responsive -->
    </div>
    </div>

