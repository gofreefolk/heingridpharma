

<?php
foreach($val as $row)

{
	//$dr_name = $row->dr_name;
	$product = $row->pname;
	$apr = $row->apr;
	$may = $row->may;
	$jun = $row->jun;
	$jul = $row->jul;
	$aug = $row->aug;
	$sep = $row->sep;
	$oct = $row->oct;
	$nov = $row->nov;
	$dece = $row->dece;
	$jan = $row->jan;
	$feb = $row->feb;
	$mar = $row->mar;
	$sec_id = $row->secondary_id;
}

 ?>


  <div class="modal-dialog" style="width: 700px">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="exampleModalLabel">Secandary Sales</h4>
      </div>
      <?php echo form_open("secondary/save_update"); ?>
      <div class="modal-body">
        
          
          <div class="form-group">
            <label for="product" class="control-label">Product</label>
             <input type="text" required="" id="product" readonly="" name="product" class="form-control" value="<?php echo $product; ?>" id="station"/>
          </div>
          <div class="form-group">
            <label for="april" class="col-md-2 control-label">April</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="apr" value="<?php echo $apr; ?>" id="april"/>
            </div>
            <label for="may" class="col-md-2 control-label">May</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="may" value="<?php echo $may; ?>" id="may"/>
            </div>
           
          </div>
          <br>
          <br/><br/>
          <div class="form-group">
          	 <label for="jun" class="col-md-2 control-label">June</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="jun" value="<?php echo $jun; ?>" id="jun"/>
            </div>
          	<label for="jul" class="col-md-2 control-label">July</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="jul" value="<?php echo $jul; ?>" id="april"/>
            </div>
          
           
          </div>
          
          <br/><br/>
          <div class="form-group">
          	  <label for="aug" class="col-md-2 control-label">Augest</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="aug" value="<?php echo $aug; ?>" id="april"/>
            </div>
            <label for="sep" class="col-md-2 control-label">September</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="sep" value="<?php echo $sep; ?>" id="sep"/>
            </div>
          	 
            
          </div>
          
          <br/><br/>
          <div class="form-group">
          	<label for="oct" class="col-md-2 control-label">October</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="oct" value="<?php echo $oct; ?>" id="oct"/>
            </div>
            <label for="nov" class="col-md-2 control-label">November</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="nov" value="<?php echo $nov; ?>" id="nov"/>
            </div>
            
            
          </div>
          <br/> <br />
          <div class="form-group">
          	<label for="dec" class="col-md-2 control-label">December</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="dec" value="<?php echo $dece; ?>" id="dec"/>
            </div>
          	<label for="jan" class="col-md-2 control-label">January</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="jan" value="<?php echo $jan; ?>" id="jun"/>
            </div>
          </div>
          <br /><br />
          <div class="form-group">
          	
            <label for="feb" class="col-md-2 control-label">February</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="feb" value="<?php echo $feb; ?>" id="feb"/>
            </div>
            <label for="mar" class="col-md-2 control-label">March</label>
            <div class="col-md-3">
             <input type="number" class="form-control" name="mar" value="<?php echo $mar; ?>" id="may"/>
            </div>
          </div>
          
       <input type="hidden" value="<?php echo $sec_id; ?>" name="sec_id" id="sec_id"/>
       
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
        </form>
    </div>
  </div>


