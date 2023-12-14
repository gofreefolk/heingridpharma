
<style>

img {
	border: none;
}

/* dock - top */
.dock {

	height: 50px; 
	text-align: center;
}
.dock-container {
	position: absolute;
	height: 50px;
	background: url(images/dock-bg2.gif);
	padding-left: 20px;
}
a.dock-item {
	position: absolute;
	display: block;
	width: 40px;
	color: #000;

	top: 0px;
	text-align: center;
	text-decoration: none;
	font: bold 12px Arial, Helvetica, sans-serif;
}
.dock-item img {
	border: none; 
	margin: 5px 10px 0px; 
	width: 100%; 
}
.dock-item span {
	display: none; 
	padding-left: 20px;
}

/* dock2 - bottom */
#dock2 {
	width: 100%;
	bottom: 0px;
	position: absolute;
	left: 0px;
}
.dock-container2 {
	position: absolute;
	height: 50px;
	background: url(images/dock-bg.gif);
	padding-left: 20px;
}
a.dock-item2 {
	display: block; 
	font: bold 12px Arial, Helvetica, sans-serif;
	width: 40px; 
	color: #000; 
	bottom: 0px; 
	position: absolute;
	text-align: center;
	text-decoration: none;
}
.dock-item2 span {
	display: none;
	padding-left: 20px;
}
.dock-item2 img {
	border: none; 
	margin: 5px 10px 0px; 
	width: 100%; 
}
	
</style>
 <script src="<?php echo base_url()."assets/"?>js/interface.js"></script>
  <script src="<?php echo base_url()."assets/"?>js/jquery.js"></script>

                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Operations</h1>
                </div>
                <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>
                
				
                <div class="dock" id="dock">
  <div class="dock-container" >
	  <a class="dock-item" href="<?php echo base_url(); ?>index.php/admin_staff_operation/edit">
	  	
	  	 <?php 
    	 $myimg = array(
     				'src'=>'assets/images/dock/edit_profile.png',
     				
     				'alt'=>"Edit Profile"
					);
     	echo img($myimg);
		 ?>
	  	<span>Edit Profile</span></a> 
	  <a class="dock-item" href="#">
	  
	  	<?php 
	  	
     $myimg = array(
     				'src'=>'assets/images/dock/daily_report.png',
     				'alt'=>"Daily Report"
					);
      echo img($myimg); ?>
	  	<span>Add Daily Report</span></a> 
	  <a class="dock-item" href="#">
	  	<?php  ?>
	  	
	  	<?php 
     $myimg = array(
     				'src'=>'assets/images/dock/portfolio.png',
     				'alt'=>"Portfolio"
					);
     echo img($myimg); ?>
	  	<span>Portfolio</span></a> 
	<!--  <a class="dock-item" href="#"><img src="images/music.png" alt="music" /><span>Music</span></a> 
	  <a class="dock-item" href="#"><img src="images/video.png" alt="video" /><span>Video</span></a> 
	  <a class="dock-item" href="#"><img src="images/history.png" alt="history" /><span>History</span></a> 
	  <a class="dock-item" href="#"><img src="images/calendar.png" alt="calendar" /><span>Calendar</span></a> 
	  <a class="dock-item" href="#"><img src="images/rss.png" alt="rss" /><span>RSS</span></a>
	  <a class="dock-item" href="#"><img src="images/rss.png" alt="rss" /><span>RSS</span></a> 
	  <a class="dock-item" href="#"><img src="images/rss2.png" alt="rss" /><span>RSS2</span></a> -->
  </div> 
</div>

                

         
          


<script type="text/javascript">
	
	$(document).ready(
		function()
		{
			$('#dock').Fisheye(
				{
					maxWidth: 50,
					items: 'a',
					itemsText: 'span',
					container: '.dock-container',
					itemWidth: 100,
					proximity: 40,
					halign : 'center'
				}
			)
			
		}
	);

</script>
