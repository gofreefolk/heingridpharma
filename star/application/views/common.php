<br /><br /><br />
<div class="container">


      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        	<?php foreach($news as $row) { ?>
    
   		
        <h1><?php echo $row->title;?></h1>
        <p><?php echo $row->details;?></p>
        <p>
        <img width="800" height="400" src="<?php echo base_url();?>uploads/<?php echo $row->image;?> "  />
        
        </p>
        <?php   	}?>
      </div>

    </div> <!-- /container -->