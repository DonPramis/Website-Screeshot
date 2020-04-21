<?php
$screen_shot_image = '';
if(isset($_POST["screen_shot"]))
{
 $url = $_POST["url"];
 $screen_shot_json_data = file_get_contents("https://www.googleapis.com/pagespeedonline/v4/runPagespeed?url=$url&screenshot=true");
 $screen_shot_result = json_decode($screen_shot_json_data, true);
 $screen_shot = $screen_shot_result['screenshot']['data'];
 $screen_shot = str_replace(array('_','-'), array('/', '+'), $screen_shot);
 $screen_shot_image = "<img width='480px' src=\"data:image/jpeg;base64,".$screen_shot."\" class='img-responsive'/>";
}

?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container">
<h2 align="center">Website Screenshot</h2><br />
   
<form method="post">   
 <div class="form-group">
     <label>Enter URL e.g. https://example.com</label>
     <input type="url" name="url" class="form-control input-lg" required autocomplete="off" />
 </div>
    <br />
    <br />
    <input type="submit" name="screen_shot" value="Take a Screenshot" class="btn btn-info" />
 </form>
   <br />
   <?php echo $screen_shot_image; ?>

   <br />   
   <br />
   
 </div>  
 
