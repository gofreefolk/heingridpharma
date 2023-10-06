<?php 
foreach($hq as $row)
{
	$hqname= $row->hqname;
		//	$hq = $hqname[0];
	$name = $row->name;
	
}

foreach($desi as $row)
{
	//$hq_exhq = $row->hq_exhq;
	$hq = $row->hq;
	$exhq = $row->exhq;
	$os = $row->os;
	$other = $row->other_expense;
}

foreach($common as $row)
{
	$fare = $row->fare;
	//$other = $row->other;
}

?>


<br/>

 <table class="table table-bordered" >
 	<caption> <?php echo  "NAME: ".$name  ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<?php echo  "HQ: ".$hqname  ?></caption>
        <thead>
          <tr height="10">
            <th width="100">Date</th>
            <th>Town Worked</th>
            <th>From</th>
            <th>To</th>
            <th>Km</th>
            <th>Fare</th>
            <th width="100">HQ/Ex/OS or Status</th>
            <th>Other expense</th>
            <th>Other</th>
            <th>Docts</th>
            <th>Total</th>
            
          </tr>
        </thead>
        
        <tbody>
        	<?php 
        	
        	$fare_total=0;
			$hq_ex_os = 0;
			$other_exp_total=0;
        	foreach($report as $row) {
        		$total=0;
        		?>
          <tr height="10">
            <td><?php echo $row->date ?></td>
          <?php  $filearr = explode(",",$row->place);
			$tworked = $filearr[0];
			?>
            <td><?php if($row->status=='work')
            			echo $tworked ?></td>
            <td><?php if($row->status=='work')
            			echo $hqname ?></td>
            <td><?php if($row->status=='work')
            			echo $row->conplace ?></td>
             <td><?php echo $row->km ?></td>
               <td><?php 
               $doct = $row->doctors_visited;
			  //echo $doct;
			  $did = explode("/", $doct);
			  $count = sizeof($did)-1;
			 
               echo $row->km*2*$fare;
			   $total = $total+$row->km*2*$fare;
			   $fare_total = $fare_total+$row->km*2*$fare;
			    ?></td>
              <?php if($row->station=='HQ' && $row->status=='work')
              {?>
              	<td><?php  
              		if($count<-8)
				{
				  //$hq = $hq/2;	
				  echo $hq/2;
				   $total = $total+$hq/2 ;
				   
				   $hq_ex_os= $hq_ex_os+$hq/2;
				}
				else
              		{echo $hq; 
              		$total = $total+$hq ;
					$hq_ex_os= $hq_ex_os+$hq;
              		}?></td>
              
              <?php }
				else if($row->station=='OS') {?>
					
              	<td><?php  if($count<-8)
              	{
              	// $os = $os/2;	
              		echo  $os/2; 
					 $total = $total+$os/2;
					 $hq_ex_os= $hq_ex_os+$os/2;
              	}
				else
              	 {echo  $os; 
				 $total = $total+$os;
				  $hq_ex_os= $hq_ex_os+$os;
				 }?>
				 
				 </td>
			<?php	}
				
					else if($row->station=='ExHQ')
					{?>
					<td>
						<?php if($count<-8)
						{
							//$exhq = $exhq/2;
							echo $exhq/2;
							$total = $total+$exhq/2;
							$hq_ex_os = $hq_ex_os+$exhq/2;
						}
					else
						{
							echo $exhq;
							$total = $total+$exhq;
							$hq_ex_os = $hq_ex_os+$exhq;
						}
						?>
					</td>	
						
				<?php		
					}
				
				else 
					{
						?>
					
              	<td><?php   echo  $row->leave_reason ;?></td>
              	
			<?php
					}
				
			  
			  
			  
			                	?>
            	 
            	 
             <td>
             	<?php 
             		echo $row->other_expense; 
             		$total = $total+$row->other_expense; 
					$other_exp_total = $other_exp_total+$row->other_expense;
             	?>
             </td>	
             <td>
             	<?php   //echo  $other ; $total = $total+$other ?>
             </td>
              <td><?php echo $count ?></td>
               <td>
               	<?php 
               	echo $total;
               
               ?></td>
               
               
          </tr>
          <?php } ?>
          <tr>
          	<th>Total</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><?php   echo  $fare_total;?></th>
            <th><?php    echo  $hq_ex_os;?></th>
            <th><?php   echo  $other_exp_total;?></th>
            <th><?php   echo  $other ; ?> </th>
            <th></th>
            <th><?php   echo  $fare_total + $hq_ex_os + $other_exp_total  + $other; ?> </th>
          </tr>
        </tbody>
      </table>
      


