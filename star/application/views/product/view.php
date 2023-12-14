  <div id="wrapper">
<div id="page-wrapper">
<div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
          
<div class="table-responsive">
	 <?php if(isset($product)) 
           {
           ?>
      <table class="table table-bordered">
      	<caption>Products</caption>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
          
          
            <th>Details</th>
            
        <!--    <th>Edit</th>-->
          </tr>
        </thead>
        <tbody>
        	<?php 
        	$count=1;
        	foreach ($product as $value ) { ?>
				
		
          <tr>
            <th scope="row"><?php echo $count++; ?></th>
            <td><?php echo $value->product_name;  ?></td>
            <td> <?php echo $value->details; ?></td>
         <!--
            <td>
            	
            	<?php  echo form_open('product/edit_product'); ?>
               	<input type="hidden" value="<?php echo $value->product_id ?>" name="staff_id" />
               	<input type="submit"  value="Edit"/>
               </form>
            	
            	
            </td>-->
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

