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
            <th width="100">DR NAME</th>
            <th>Proudct Rx</th>
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
            
          </tr>
        </thead>
        
        <tbody >
        	<?php 
        	
        	
        	foreach($report as $row) {
        		
        		?>
        	
          <tr>
          	
            
            <td><?php echo $row->dr_name?></td>
          
         
            <td><?php echo $row->product ?></td>
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
        
          </tr>
          <?php } ?>
            
           
          
          
          
        </tbody>
      </table>
      

