<?php date_default_timezone_set('Asia/Kolkata');?>
  

<?php
foreach($val as $row)

{
	$place_id = $row->place;
	$station = $row->station;
	$hotel = $row->hotel_lodge;
	$tour_id = $row->tourplan_id;
//	$tour_date = $row->tour_date;
}

 ?>
 <input type="hidden" id="combo"  value="<?php echo $place_id ?>"/>

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="exampleModalLabel">Tour Plan</h4>
      </div>
      <?php echo form_open("tourplan/save_update"); ?>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="place"  class="control-label">Place of Work</label>
            
         	<select class="form-control" required="" name="place" id="place">
      											<option value="">
													&lt;--Select--&gt;
												</option>
                                        		<?php 
                                        		
                                        		foreach($place as $value)
                                        		{
                                        			?>
                                        			<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                        			<?php
                                        		}
                                        		?>
                                           
                                            	
												
                                           
                                           </select>
          </div>
          
          <div class="form-group">
            <label for="station" class="control-label">Station</label>
             <input type="text" required="" id="station" name="station" class="form-control" value="<?php echo $station; ?>" id="station"/>
          </div>
          <div class="form-group">
            <label for="phone" class="control-label">Hotel Contact No with Std code</label>
             <input type="text" class="form-control" name="phone" value="<?php echo $hotel; ?>" id="phone"/>
          </div>
       <input type="hidden" value="<?php echo $tour_id; ?>" name="tourplan_id" id="tourplan_id"/>
       
      </div>
      <div class="modal-footer">
       
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
        </form>
    </div>
  </div>


<script>
        $(document).ready(function(){
        	if($('#combo').val()!=0)
     			$('#place').val($('#combo').val());
     		
     	$("#place").change(function(){
     		var place=$(this).val();
     		jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/tourplan/getstation",
				dataType: 'json',
				data: { place: place 
										 
					 },
				success: function(res){
					
					var object = eval(res);
					//alert(res);
					$("#station").val(object.station);
													
					
				}
			});
     		
     	});
     }) ;
     
      
	
</script>