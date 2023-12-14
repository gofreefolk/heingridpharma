  <div id="wrapper">
<div id="page-wrapper">
<div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Welcome Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
          
<div class="table-responsive">
	 <?php if(isset($place)) 
           {
           ?>
      <table class="table table-bordered">
      	<caption>Places</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
          
          
            <th>District</th>
            <th>State</th>
            <th>Headquarter</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        	<?php 
        	$count=1;
        	foreach ($place as $value ) { ?>
				
		
          <tr>
            <th scope="row"><?php echo $count++; ?></th>
            <td> <?php echo $value->name; ?></td>
         
            <td> <?php echo $value->district; ?></td>
            <td> <?php echo $value->state; ?></td>
            <td> <?php 
            		if($value->hq=='hq')
            		echo $value->hq; 	
					?></td>
            <td>
            	
            	<?php  echo form_open('admin_operations/delete_place'); ?>
               	<input type="hidden" value="<?php echo $value->id ?>" name="place_id" />
               	<input type="submit"  value="Delete"/>
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

