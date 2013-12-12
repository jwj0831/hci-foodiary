<div id="upload_page" class="mainWrapper">
	<div id="upload_container">
		<div id="upload_title">
			<div>Upload New Food Records</div>
		</div>
		<div class="upload_area">
<?php
	$attr = array( 'role' => 'form', 'id' => 'upload_action','method' => 'post' );
 	echo form_open_multipart('/new_food/upload', $attr);
?>
			<div class="thumbnail" id="food_img_thumb">
                <img class="img-rounded" id="img-thumb-area" src="" alt="food_pic" />
			</div>
			<div class="form-group" id="food_name_input">
				<input type="text" class="form-control" id="input_name" name="food_name" value="<?php echo set_value('food_name'); ?>" placeholder="Input Food's name">
			</div>
			<div id="img_input">
				<input multiple id="fileUpload" name="userfile" accept="image/*;capture=camera" type="file" value="<?php echo set_value('userfile'); ?>" onchange="PreviewImage();"/>
                <button type="button" id="fileSelect"class="btn btn-info"><span class="glyphicon glyphicon-camera"></span></button>
                <script type="text/javascript">
					document.querySelector('#fileSelect').addEventListener('click', function(e) {
						// Use the native click() of the file input.
					  	document.querySelector('#fileUpload').click();
					}, false);
					
				    function PreviewImage() {
				        var imageReader = new FileReader();
				        imageReader.readAsDataURL(document.getElementById("fileUpload").files[0]);
				        imageReader.onload = function (oFREvent) {
				            document.getElementById("img-thumb-area").src = oFREvent.target.result;
				            document.getElementById("img-thumb-area").style.width = "400px";
							document.getElementById("img-thumb-area").style.height = "250px";
							document.getElementById("img-thumb-area").style.display = "block";
				        };
				        
				    };
				</script>
			</div>
			<div id="geoLoc-area">
				<input type="hidden" class="geo-location" id="geo-result-input" name="geo-result" value="GEO_OK">
				<input type="hidden" class="geo-location" id="geo-lat-input" name="geo_lat" value="0.0">
				<input type="hidden" class="geo-location" id="geo-long-input" name="geo_long" value="0.0">
			</div>
			<div id="rating-area">
				<div class="starrr upload"></div>
				<input type="hidden" class="rating-location" id="rating-val" name="ratings" value="0">
			</div>
			<dvi class="comment_area">
				<div id="panel-area" class="panel panel-default">
					<div class="panel-heading">Comments</div>
				  	<div class="panel-body">
						<textarea class="form-control" id="input_comments" name="comments" value="<?php echo set_value('comments'); ?>"  rows="3" placeholder="Write your comments"></textarea>
					</div>
				</div>
			</dvi>
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

