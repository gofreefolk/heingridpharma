
<br/>
<br/>
<?php
$hq="";
	foreach($report as $row)
	{
		 $row->place;
		 
		    $place= explode(",",$row->place); 
			$hq = $hq.','.$place[0];
			$worked_with= $row->dwith;
				
	}
	
	
?>



<table class="table table-bordered">
<caption><b>Town: </b><?php echo $hq  ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Worked With : </b><?php echo $worked_with ?></caption>
	<tr>
		<th>CCL.No</th>
		<th>Name of Doctor</th>
		<th>Specialized</th>
	</tr>
<?php 
$i=1;
foreach($doctor as $row)
 {
 	//print_r($row);
	foreach($row as $val)
	{?>
	<tr>
		<td><?php echo $i++ ?></td>	
	<td><?php	echo $val->name; ?> </td>
	<td><?php	echo $val->specialized; ?></td>
	</tr>
	<?php }
	
 }	
 ?>
 
 
</table>
 <table>
 	<tr>
 		
 		<th>Name of the Chemist</th>
 	</tr>
 	<?php
 	$i=1;
 	 foreach($report as $row)
	{?>
	<tr>	
	
	<td><?php	echo $row->chemist; ?></td>
	</tr>
	<?php } ?>
 </table>