 <br/>
 <div class="container">
           <!--   <?php if(isset($_GET['var']))
                        {
                        if($_GET['var']=="exm"){?>
                           <div class="alert alert-success alert-message">Successfully added Objective Question</div>
                          <?php }}
                        ?>
 -->
 <div class="jumbotron">
		      <div class="well">
            <form class="form-group" action="saveExam.php" method="POST" role="form">
        
            <div class="form-group">
             <label><small>Select Subject</small></label>
                <select class="form-control" name="subject" tabindex="5" required="required">
                                <option value="">--Select Subject--</option>
                               <!-- <?php $sql="select * from subject";
                                    $res=mysql_query($sql);
                                    while($arr=mysql_fetch_array($res))
                                    {
                                ?>
                                <option value="<?php echo $arr['sub_id'];?>"><?php echo $arr['sub_name'];?></option>
                              <?php } ?>  -->
                              </select>
                </div>
                
                
                <div class="form-group">
                    <label ><small>Exam Name</small></label>
                    <input type="text" class="form-control" name="exam_name" tabindex="3" placeholder="Exam Name" required="required" >
                </div>
               
                
                <div class="form-group">
                    <label><small>Total Marks</small></label>
                 <input type="text" class="form-control" name="exam_mark" tabindex="3" placeholder="Total Marks" required="required" >
                 </div>
                
                
                <div class="from-gropu">
                    <label><small>Exam Duration </small></label>
                    <input type="text" class="form-control" name="exam_duration" tabindex="3" placeholder="Duration in Minutes" required="required">
                 </div>
              
                
                <div class="form-gropu">
                    <label><small>Exam Date</small></label>
                    <input type="date" class="form-control" name="exam_date" tabindex="3" placeholder="Exam Date" required="required">
                </div>
                
                
                    <div class="control-group">
								<!-- Button -->
                    <div class="controls">
                        <br /> <button name="exam" id="exam" class="btn btn-primary pull-right" style="width:22%;">Submit</button>
                                <button type="reset" class="btn btn-danger pull-right" style="width:22%;">reset</button>
                    </div>
                    </div>

                
               
                
                
               
                </form>
                  </div>
                </div>
               </div>