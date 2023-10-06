<!DOCTYPE html>
<html>
   <head>
   <script type="text/javascript">
/*function noBack()
         {
             window.history.forward()
         }
        noBack();
        window.onload = noBack;
        window.onpageshow = function(evt) { if (evt.persisted) noBack() }
        window.onunload = function() { void (0) }*/
</script>
      <title><?php echo 'Uspharma: '.$title ?> </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <script src="<?php echo base_url()."assets/"?>js/jquery-2.1.1.min.js"></script>
      <script src="<?php echo base_url()."assets/"?>js/bootstrap.min.js"></script>
      <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
     
     <script>
     	
     	 $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
     </script>
   </head>
   <body onload="initialize()">
   	<br/><br/><br/>