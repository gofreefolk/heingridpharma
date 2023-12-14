<style type="text/css" media="print">
.dontprint
{ display: none; }
</style>


<script>
	
	function premove()
	{
		alert();
	}
	$(document).ready(function(){
		$("input[type=button]").click(function(){
			if(this.value=="Remove")
			{
				var pid = this.id;
				
				
				jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/secondary/remove",
				dataType: 'text',
				data: { product_id: pid
										 
					 },
				success: function(res){
					location.reload();
					alert(res);
				}
			});
			}
			else if(this.value=="Add")
			{
				var pid = this.id;
				
				
				jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/secondary/add",
				dataType: 'text',
				data: { product_id: pid
										 
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


<br/>

 <table  class="table table-bordered" >
 	<caption> 
 	</caption>
        <thead>
          <tr height="10">
            
            <th>Proudct Name</th>
            <th>Details</th>
           <th></th>
           
	
  
 </th>
          </tr>
        </thead>
        
        <tbody >
        	<?php 
        	
        	
        	foreach($product as $row) {
        		
        		?>
        		
          <tr>
          	
            
           
            <td><?php echo $row->product_name ?></td>
            <td><?php echo $row->details ?></td>
           
        
             <th class="dontprint"> 
             	<input type="hidden" name="con_id" id="con_id" value="<?php  echo  $row->product_id ;?>"/>
             	<!--<?php
             	if(count($secondary)==0)
				{?>
					<input type="submit" class="btn btn-primary" value="Add"/>	
			 <?php	}
			 ?>
			 -->
				
					<?php
					 $flag=1;
					foreach($secondary as $s)
					{
						if($s->product_id==$row->product_id)
						{
						$flag=0;
						break;
						}
					}
					if($flag==0)
					{
					?>	
						<input type="button" disabled="" class="btn btn-primary" value="Add"/>
						<input type="button"   id='<?php echo $row->product_id ?>' class="btn btn-primary" value="Remove"/>
						<?php	
					}
					else 
					{
						?>	
						<input type="button" id='<?php echo $row->product_id ?>' class="btn btn-primary" value="Add"/>
						<input type="button" disabled="" class="btn btn-primary" value="Remove"/>
						<?php
					}
				//}
             	?>
				
	
             	</th>
            
           
             <?php 
	
			} ?> 	
		
          
          
        </tbody>
      </table>
      

