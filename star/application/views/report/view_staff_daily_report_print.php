<style type="text/css" media="print">
.dontprint
{ display: none; }
</style>
<br/>
<br/>
<div class="dontprint">
	<?php  
	$attributes = array('id' => 'myform');
	echo form_open('report/edit_daily', $attributes);  ?>
	 	<input type="hidden" value="" name="daily_id" id ="daily_id" />
		<?php	foreach($report as $row)
			{
	?>
				
              
               	<input type="submit" id="<?php echo $row->daily_id ?> "  value="<?php echo $row->place ?>"/>
               
               	  	<button type="button" value="<?php echo $row->daily_id ?>">Delete&nbsp;</button>
      <?php } ?>
      </form>
      </div>
      <script>
      
    $("#myform").click(function(){
      	var btn= $(this).find("input[type=submit]:focus").attr("id");
    //  var parentFormID = $(this).closest("form").attr("id");
        $("#daily_id").val(btn)
		/*var checkedValues = $('input:checkbox:checked').map(function() {
    return this.id;
		}).get();
		$("#check").val(checkedValues);
		if(checkedValues=='')
		{
			alert('Please Add Doctor')
			return false;
		}
		//alert(checkedValues);*/
			});
</script>
        
<?php 
			
			
$hq="";
	foreach($report as $row)
	{
		 $row->place;
		 
		    $place= explode(",",$row->place); 
			$hq = $place[0] .', '.$hq;
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
 

<script>
	
	$(document).ready(function(){
		/*$('button').click(function(){
			
		});*/
		
		$('button').click(function(){
		var id = this.value;
		
		var val=confirm("Alert :Do You want to continue? This cant be undo.!");
		
		if(val==true){
		jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/report/delete_daily",
				dataType: 'text',
				data: { daily_id :id
										 
					 },
				success: function(res){
					location.reload();
				alert(res);
				
				}
			});
		}
		
		});
		
	});
	
</script>