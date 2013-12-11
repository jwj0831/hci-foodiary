			<footer id="footer">
				<div>Copyright by 2013 HCI Proj.</div>
			</footer>
		</div><!--/#wrapper -->
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
		<script src="/hci-foodiary/static/scripts/jquery.starrr.js" type="text/javascript"></script>
		<script type="text/javascript">
	    	$(document).ready(function() {
				// input rating value
				$('.starrr').on('starrr:change', function(e, value){
				  //alert('new rating is ' + value);
				  $('#rating-val').val( value );
				});
				
				$("#upload-btn").click(function(){
					if($("#input_name").val() == ""){
						alert('Please Input Food name');
						return false;
					}
					else{
						$("#upload_action").submit();
					}
				});
				
				var offset = 9; //total loaded record group(s)
				var loading  = false; //to prevents multipal ajax loads
				var cookie = getCookie('csrf_cookie_name');
				
				$(window).scroll(function() {//detect page scroll
					if ($(window).scrollTop() + $(window).height() == jQuery(document).height())//user scrolled to bottom of the page?
					{
						// Total Count 
						//if (track_load <= total_groups && loading == false)//there's more data to load
						if (loading == false)
						{
							loading = true;	//prevent further ajax loading

							//load data from the server using a HTTP POST request
							var myData = {'offset' : offset};
							var myDataString = JSON.stringify(myData);
							$.ajax({
								type: 'post',
								url: '/hci-foodiary/ajaxFood',
								data: {'data': myDataString, 'csrf_test_name':cookie},
								ContentType: "application/json",
								error:function(xhr, ajaxOptions, thrownError) {//any errors?
									alert(thrownError);//alert with HTTP error
									//$('.animation_image').hide();//hide loading image
									loading = false;
								},
								success:function(result){
									console.log(result);
									$("#foods").append(result);
									loading = false;
									offset = offset + 9;
								}
							});
						}
					}
				});
			});
	
			function getCookie( name )
			{
				var nameOfCookie = name + "=";
				var x = 0;
		
				while ( x <= document.cookie.length )
				{
					var y = (x+nameOfCookie.length);
		
					if ( document.cookie.substring( x, y ) == nameOfCookie ) {
						if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 )
							endOfCookie = document.cookie.length;
		
						return unescape( document.cookie.substring( y, endOfCookie ) );
					}
		
					x = document.cookie.indexOf( " ", x ) + 1;
		
					if ( x == 0 )
		
					break;
				}
		
				return "";
			}
 	  	</script>
	</body>
</html>