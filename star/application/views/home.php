<!DOCTYPE html>
<html>
   <head>
      <title>Bootstrap 101 Template</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap -->
      <link href="<?php echo base_url()."/assets/"?>css/bootstrap.min.css" rel="stylesheet">
      <script src="<?php echo base_url()."/assets/"?>js/jquery-2.1.1.min.js"></script>
      <script src="<?php echo base_url()."/assets/"?>js/bootstrap.min.js"></script>
   </head>
   <body>

<nav class="navbar navbar-default" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand" href="#">TutorialsPoint</a>
   </div>

   <div id="myexample">
      <ul class="nav navbar-nav">
         <li class="active"><a href="#">iOS</a></li>
         <li><a href="#">SVN</a></li>
         <li class="dropdown">
            <a href="#" class="dropdown-toggle">Java <b 
               class="caret"></b></a>
               <ul class="dropdown-menu">
                  <li><a id="action-1" href="#">
                     jmeter</a>
                  </li>
                  <li><a href="#">EJB</a></li>
                  <li><a href="#">Jasper Report</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
               </ul>
            </li>
         </ul>
      </div> 
   </nav> 
   
   
   <?php 
   echo link_tag("assets/css/bootrap-theme.css");
   ?>
 
<script>
   $(function(){
      $(".dropdown-toggle").dropdown('toggle');
      }); 
</script> 


   </body>
</html> 
