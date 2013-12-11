<div id="upload_page" class="mainWrapper">
	<div id="upload_container">
		<div id="upload_title">
			<div>Your Food Records</div>
		</div>
		<div class="food_area">
<?php
	$file_info = explode(".", $food->file_name);
	if(is_file('./uploads/'.$file_info[0]."_thumb.".$file_info[1]))
	{
		$thumb_img = '/hci-foodiary/uploads/'.$file_info[0]."_thumb.".$file_info[1];
	}
	else
	{
		$thumb_img = '/hci-foodiary/uploads/'.$food->file_name;
	}

?>
			<div class="thumbnail" id="food_img_thumb">
                <img class="img-rounded" id="food-record-img-thumb" src="<?php echo $thumb_img; ?>" alt="food_pic" />
			</div>
			<div class="form-group" id="food_name_input">
				<?php echo $food->food_name; ?>
			</div>
			<div class="form-group" id="food_name_input">
				<?php echo $food->reg_date; ?>
			</div>
			<div class="form-group" id="food_name_input">
				<?php echo $food->geo_lat; ?>
			</div>
			<div class="form-group" id="food_name_input">
				<?php echo $food->geo_long; ?>
			</div>
			<script type="text/javascript">
  window.onload = function() {
    initialize();
  }
</script>
			<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> 
 <script> 
  function initialize() { 
  var myLatlng = new google.maps.LatLng(<?php echo $food->geo_lat; ?>, <?php echo $food->geo_long; ?>); 
  var mapOptions = { 
        zoom: 17, 
        center: myLatlng, 
        mapTypeId: google.maps.MapTypeId.ROADMAP 
  } 
  var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
  var marker = new google.maps.Marker({ 
            position: myLatlng, 
            map: map, 
            title: "<?php echo $food->food_name; ?>" 
});  
  } 
 </script> 
			<div id="map_canvas"style="width:500px; height:300px;"></div> 
			<div id="rating bar" class="pull-right">
<?php
$i=0;
for($i=0; $i <$food->ratings; $i++)
{
	echo '<span class="glyphicon glyphicon-star"></span>';
}
for(; $i < 5; $i++)
{
	echo '<span class="glyphicon glyphicon-star-empty"></span>';
}

?>
			</div>
		</div><!-- .-->
	</div><!-- #container -->
</div><!-- #mainWrapper -->

