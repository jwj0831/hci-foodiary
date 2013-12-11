<div id="upload_page" class="mainWrapper">
	<div id="upload_container">
		<div id="upload_title">
			<div>Upload New Food Records</div>
		</div>
		<div class="upload_area">

<?php
//	$attr = array( 'role' => 'form', 'id' => 'upload_action','method' => 'post' );
//	echo form_open_multipart('/foods/new_food', $attr);
?>
		<form action="/hci-foodiary/foods/new_food" accept-charset="utf-8" role="form" id="upload_action" method="post" enctype="multipart/form-data">

			<div class="thumbnail" id="food_img_thumb">
                <img class="img-rounded" id="img-thumb-area" src="" alt="food_pic" />
                <input id="input_img" name="userfile" type="file" accept="image/*;capture=camera" value="<?php echo set_value('userfile'); ?>" onchange="PreviewImage();"/>
                <script type="text/javascript">
				    function PreviewImage() {
				        var imageReader = new FileReader();
				        imageReader.readAsDataURL(document.getElementById("input_img").files[0]);
				        imageReader.onload = function (oFREvent) {
				            document.getElementById("img-thumb-area").src = oFREvent.target.result;
				            document.getElementById("img-thumb-area").style.width = "400px";
							document.getElementById("img-thumb-area").style.height = "250px";
							document.getElementById("img-thumb-area").style.display = "block";
				        };
				        
				    };
				</script>
			</div>
			<div class="form-group" id="food_name_input">
				<input type="text" class="form-control" id="input_name" name="food_name" value="<?php echo set_value('food_name'); ?>" placeholder="Enter Food's name">
			</div>
			<div id="geoLoc-area">
				<input type="hidden" class="geo-location" id="geo-result-input" name="geo-result" value="GEO_OK">
				<input type="hidden" class="geo-location" id="geo-lat-input" name="geo-lat" value="0.0">
				<input type="hidden" class="geo-location" id="geo-long-input" name="geo-long" value="0.0">
			</div>
			<div id="rating-area">
				<div class="starrr upload"></div>
				<input type="hidden" class="rating-location" id="rating-val" name="ratings" value="0">
			</div>
			<div id="btn-area">
				<button type="button" class="btn btn-primary" id="upload-btn">Send</button>
			</div>
			<div class="error">
				<p class="help-block">
<?php
if(@$error) {
	echo $error."<BR>";
}
?>
				<?php echo validation_errors(); ?>
				</p>
			</div>
			<script>
				if ( typeof navigator.geolocation == 'undefined') {
					alert("Sorry, your browser doesn't support Geolocation.")
				} else {
					navigator.geolocation.getCurrentPosition(granted, denied)
	
					function granted(position) {
						document.getElementById('geo-lat-input').value = position.coords.latitude;
						document.getElementById('geo-long-input').value = position.coords.longitude;
					}
	
					function denied(error) {
						var message
						switch(error.code) {
							case 1:
								message = 'Permission Denied';
								break
							case 2:
								message = 'Position Unavailable';
								break
							case 3:
								message = 'Operation Timed Out';
								break
							case 4:
								message = 'Unknown Error'
						}
						document.getElementById('geo-result').value = message
					}
				}
			</script>
			</form>
		</div><!-- .-->
	</div><!-- #container -->
</div><!-- #mainWrapper -->

