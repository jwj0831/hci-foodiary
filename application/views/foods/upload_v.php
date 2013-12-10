<div id="upload_page" class="mainWrapper">
	<div id="container">
		<div id="upload_title">
			<div>Upload New Food Records</div>
		</div>
		<div class="upload_area">
<?php
	$attr = array( 'role' => 'form', 'id' => 'upload_action','method' => 'post' );
	echo form_open_multipart('/foods/new_food', $attr);
?>
			<div class="thumbnail" id="food_img_thumb">
                <img class="img-rounded" id="img-thumb-area" src="http://placehold.it/400x250/000/fff" alt="food_pic" />
                <input id="food_img" type="file" accept="image/*;capture=camera" value="<?php set_value('food_img')?>" onchange="PreviewImage();"/>
                <script type="text/javascript">
				    function PreviewImage() {
				        var imageReader = new FileReader();
				        imageReader.readAsDataURL(document.getElementById("food_img").files[0]);
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
				<input type="text" class="form-control" id="food_name" placeholder="Enter Food's name">
			</div>
			<div id="geoLoc-area">
				<input type="hidden" class="geo-location" id="geo-result" value="GEO_OK">
				<input type="hidden" class="geo-location" id="geo-lat" value="0.0">
				<input type="hidden" class="geo-location" id="geo-long" value="0.0">
			</div>
			<div id="rating-area">
				<div class="starrr"></div>
				<input type="hidden" class="rating-location" id="rating-val" value="0">
			</div>
			<div id="btn-area">
				<button type="button" class="btn btn-primary" id="upload-btn">Send</button>
			</div>
			
			<script>
				if ( typeof navigator.geolocation == 'undefined') {
					alert("Sorry, your browser doesn't support Geolocation.")
				} else {
					navigator.geolocation.getCurrentPosition(granted, denied)
	
					function granted(position) {
						document.getElementById('geo-lat').value = position.coords.latitude;
						document.getElementById('geo-long').value = position.coords.longitude;
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

