<style type="text/css" media="print">
.dontprint
{ display: none; }
</style>


<?php 
foreach($hq as $row)
{
	$hqname= explode(",",$row->hqname); 
			$hq = $hqname[0];
	$name = $row->name;
	
}

foreach($desi as $row)
{
	$desiname = $row->designation_name;

}


?>


<br/>

 <table  class="table table-bordered" >
 	<caption> <?php echo  "NAME: ".$name  ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<?php echo  "HQ: ".$hqname[0]  ?>
 		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<b><?php echo  $desiname;  ?></b>
 		
 	</caption>
        <thead>
          <tr height="10">
            <th>Product</th>
            <th>APR</th>
            <th>MAY</th>
            <th>JUN</th>
            <th>JUL</th>
            <th>AUG</th>
            <th>SEP</th>
            <th>OCT</th>
            <th>NOV</th>
            <th>DEC</th>
            <th>JAN</th>
            <th>FEB</th>
            <th>MAR</th>
            <th class="dontprint"> 
	
  
 </th>
          </tr>
        </thead>
        
        <tbody >
        	<?php 
        	
        	
        	foreach($report as $row) {
        		
        		?>
        		<?php echo form_open("secondary/update"); ?>
          <tr>      
          
         
            <td><?php echo $row->pname ?></td>
            <td><?php echo $row->apr ?></td>
            <td><?php echo $row->may ?></td>
            <td><?php echo $row->jun ?></td>
            <td><?php echo $row->jul ?></td>
            <td><?php echo $row->aug ?></td>
            <td><?php echo $row->sep ?></td>
            <td><?php echo $row->oct ?></td>
            <td><?php echo $row->nov ?></td>
            <td><?php echo $row->dece ?></td>
            <td><?php echo $row->jan ?></td>
            <td><?php echo $row->feb ?></td>
            <td><?php echo $row->mar ?></td>
        
             <th class="dontprint"> 
             	<input type="hidden" name="sec_id" id="sec_id" value="<?php  echo  $row->secondary_id ;?>"/>
				<input type="submit" class="btn btn-primary" value="Edit"/>
	
             	</th>
            
           
             <?php 
			echo form_close();
			?>
			 </tr>
			<?php
			} ?> 	
		
          <tr>
          	<th>VALUE</th>
          	<?php
          	foreach($value as $v)
			{?>
			<th><?php echo $v->apr ?></th>	
			<th><?php echo $v->may ?></th>	
			<th><?php echo $v->jun ?></th>	
			<th><?php echo $v->jul ?></th>	
			<th><?php echo $v->aug ?></th>
			<th><?php echo $v->sep ?></th>
			<th><?php echo $v->oct ?></th>
			<th><?php echo $v->nov ?></th>
			<th><?php echo $v->dece ?></th>
			<th><?php echo $v->jan ?></th>
			<th><?php echo $v->feb ?></th>
			<th><?php echo $v->mar ?></th>	
			<th class="dontprint">
				<?php echo form_open("secondary/edit_value")  ?>
				<input type="hidden" name="value" id="value" value="<?php  echo  $v->value_id ;?>"/>
				<input type="submit" class="btn btn-primary" value="Edit"/>
			 <?php echo form_close(); ?>		
			</th>							
		<?php	}
          	?>
          </tr>
         
        </tbody>
      </table>
      

