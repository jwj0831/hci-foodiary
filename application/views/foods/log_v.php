<div id="mainWrapper">
	<div id="container">
		<div class="page_title">
			<div>Upload Your New Food Records</div>
		</div>
		<div class="upload_area">
			<div class="input-group">
				<span class="input-group-addon">Menu</span>
				<input type="text" class="form-control" placeholder="Menu...">
			</div>
	
			<div class="btn-group">
				<button type="button" class="btn btn-default">
					<span class="glyphicon glyphicon-thumbs-up"> Thumbs Up</span>
				</button>
				<button type="button" class="btn btn-default">
					<span class="glyphicon glyphicon-thumbs-down"> Thumbs Down</span>
				</button>
			</div>
	
			<div class="panel panel-primary">
				<div class="iphone panel-heading">
					Comments
				</div>
				<div class="panel-body">
					<textarea class="form-control" rows="3" placeholder="Comments"></textarea>
				</div>
	
			</div>
			<div id="status" class="well">
				...
			</div>
			<script>
				if ( typeof navigator.geolocation == 'undefined') {
					alert("Sorry, your browser doesn't support Geolocation.")
				} else {
					navigator.geolocation.getCurrentPosition(granted, denied)
	
					function granted(position) {
						//document.getElementById('status').innerHTML = 'Permission Granted'
						var gmap = 'Your Lat: ' + position.coords.latitude + ' Your Long: ' + position.coords.longitude
						document.getElementById('status').innerHTML = gmap
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
	
						document.getElementById('status').innerHTML = message
					}
	
				}
			</script>
	
			<button type="button" class="btn btn-default">
				Send
			</button>
	
			<form>
				<input type="file" accept="image/*;capture=camera">
				<input type="submit"/>
				<!--<input type="button" value="get Photo path" onclick="getPhoto()">-->
			</form>
		</div><!-- .-->
	</div><!-- #container -->
</div><!-- #mainWrapper -->

