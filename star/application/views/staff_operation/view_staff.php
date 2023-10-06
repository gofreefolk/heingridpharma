  <div id="wrapper">
<div id="page-wrapper">
<div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Welcome Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
          
<div class="table-responsive">
	 <?php if(isset($staff_details)) 
           {
           ?>
      <table class="table table-bordered">
      	<caption>Staff Details</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
          
          
            <th>Eamil</th>
            <th>Head Quater</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
        	<?php 
        	$count=1;
        	foreach ($staff_details as $value ) { ?>
				
		
          <tr id="<?php echo $value->staff_id;  ?>">
            <th scope="row"><?php echo $count++; ?></th>
            <td> <?php echo $value->name; ?></td>
         
            <td> <?php echo $value->email; ?></td>
            <td> <?php echo $value->hqname; ?></td>
            <td>
            	
            	<?php  echo form_open('staff/staff_operation'); ?>
               	<input type="hidden" value="<?php echo $value->staff_id ?>" name="staff_id" />
               	<input type="submit"  value="More"/>
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

