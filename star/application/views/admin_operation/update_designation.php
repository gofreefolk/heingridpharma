  <div id="wrapper">
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Welcome Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="position: relative; left: 110px">
                <div class="col-lg-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Update Designaion
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                    foreach($designation as $row)
									{
										$name = $row->designation_name;
										$basic = $row->basic_pay;
										$details = $row->details;
										$hq = $row->hq;
										$exhq = $row->exhq;										
										$os = $row->os;
										$other_expense= $row->other_expense;
										$id = $row->designation_id;
									}
                                    
                                     echo form_open('admin_operations/update_designation'); ?>
                                     <input type="hidden" value="<?php echo $id?>" name = "desi_id" />
                                        <div class="form-group">
                                            <label for ="designation">Designation</label>
                                            <input class="form-control" value="<?php echo $name?>"  required="" name="designation" id="designation">
                                            <p class="help-block">Example ARM, BE, etc</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="basic_pay">Basic Pay</label>
                                            <input class="form-control"  value="<?php echo $basic?>"  placeholder="Enter the basic salary" name="basic_pay" id="basic_pay" type="number" value="0" min="0">
                                        </div>
                                   
                                     
                                        <div class="form-group">
                                            <label for="details">Details (Full Form etc)</label>
                                            <textarea class="form-control"  rows="3" name="details" id ="details"><?php echo $details?></textarea>
                                        </div>
                                    	 <div class="form-group">
                                            <label for="details">HQ</label>
                                            <input class="form-control" required=""  value="<?php echo $hq?>" type="number" name="hq" id="hq">
                                        </div>
                                        <div class="form-group">
                                            <label for="details">ExHQ</label>
                                            <input class="form-control" required=""  value="<?php echo $exhq?>" type="number" name="exhq" id="exhq">
                                        </div>
                                         <div class="form-group">
                                            <label for="details">OS</label>
                                            <input class="form-control" required="" type="number" value="<?php echo $os?>"  name="os" id="os">
                                        </div>
                                       <div class="form-group">
                                            <label for="details">Other_expense</label>
                                            <input class="form-control" required=""  value="<?php echo $other_expense?>" type="number" name="other_expense" id="other_expense">
                                        </div>
                                   
                                   
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                  <br/><br/> <br/><br/> <br/><br/>
                                  <?php if ($val==1){ ?>
                                 <div class="alert alert-success" role="alert">
 								 <span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
 								 <span class="sr-only">Saved:</span>
  								 Designation is Saved
								 </div>
								 <?php }
									else if($val==0)
									{
									?>
									<div class="alert alert-info" role="alert">
 								 <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
 								 <span class="sr-only">Information:</span>
  								 You can enter the details of designation
								 </div>
									<?php	
									}
								 ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
       </div>
        <!-- /#page-wrapper -->