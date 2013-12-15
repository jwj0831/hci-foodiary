<div id="food_page" class="mainWrapper">
	<div id="food_container">
		<div id="food_title">
			<div>Your Food Records</div>
		</div>
		<div id="food_body">
			<div class="row food_info_row">
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
				<div class="thumbnail col-md-6" id="food_img_thumb">
	                <img class="img-rounded" id="food-record-img-thumb" src="<?php echo $thumb_img; ?>" alt="food_pic" />
				</div>
				<div class="col-md-6" id="food_record_info">
					<div class="form-group" id="user_name">
						<span class="label label-default glyphicon glyphicon-user"> User</span> <?php echo $food->user_name; ?>
					</div>
					<div class="form-group" id="reg_date">
						<span class="label label-default glyphicon glyphicon-calendar"> Date</span> <?php echo $food->reg_date; ?>
					</div>
					<div class="form-group" id="food_name">
						<span class="label label-default glyphicon glyphicon-cutlery"> Food</span> <?php echo $food->food_name; ?>
					</div>
					<div class="form-group" id="ratings">
	      				<span class="label label-default glyphicon glyphicon-star-empty"> Rate</span>
	      				<div id="rate-bar">
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
	      			</div>
					<div class="well well-sm" id="food_comments">
						<?php echo $food->comments; ?>
					</div>
				</div>
			</div>
			<div class="row food_info_row">
				<div class="panel panel-default">
					<div class="panel-heading" id="map_panel_heading">Map</div>
					<div class="panel-body" id="map_panel_body">
				    	<div id="map_canvas"></div> 
				  	</div>
				</div>			
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
			

		</div><!-- #food_body-->
	</div><!-- #food_container -->
</div><!-- #food_page -->

