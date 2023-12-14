<style type="text/css" media="print">
.dontprint
{ display: none; }
</style>


<?php 
foreach($hq as $row)
{
	$hqname= $row->hqname; 
		//	$hq = $hqname[0];
	$name = $row->name;
	
}

foreach($desi as $row)
{
	$desiname = $row->designation_name;

}


?>


<br/>

 <table  class="table table-bordered" >
 	<caption> <?php echo  "NAME: ".$name  ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<?php echo  "HQ: ".$hqname  ?>
 		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<b><?php echo  $desiname;  ?></b>
 		
 	</caption>
        <thead>
          <tr height="10">
            <th width="100">Date</th>
            <th>Place of Work</th>
            <th>Station</th>
            <th>Hotel Phone with STD</th>
            
          </tr>
        </thead>
        
        <tbody >
        	<?php 
        	
        	
        	foreach($report as $row) {
        		
        		?>
        		
          <tr>
          	
            
            <td><?php echo $row->tour_date ?></td>
          
           
            <td><?php 
            if($row->day=='Sun')
			echo 'Sunday';
			
				else
            {
            	if(isset($row->place_name))
            		echo $row->place_name; 
			} ?></td>
            <td><?php echo $row->station ?></td>
            <td><?php   echo  $row->hotel_lodge ;?>
       </td>
         
       
            
             	</tr>
             <?php 
		
			} ?> 	
		
          
          
        </tbody>
      </table>
      

