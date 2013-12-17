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
		
			var pathArray = window.location.pathname.split( '/' );
			var currentPage = pathArray[2];
			
			if(currentPage == "new_food") {
				$("#new_menu").addClass("active");
				$("#me_menu").removeClass("active");
				$("#recommend_menu").removeClass("active");
				$("#recommmed_btn").removeClass("active");
			}
			else if(currentPage == "recommend") {
				$("#new_menu").removeClass("active");
				$("#me_menu").removeClass("active");
				$("#recommend_menu").addClass("active");
				$("#recommend_btn").addClass("active");
			}
			else if(currentPage == "foods") {
				$("#new_menu").removeClass("active");
				$("#me_menu").addClass("active");
				$("#recommend_menu").removeClass("active");
				$("#recommend_btn").removeClass("active");
				
				
				var widthVal = $(".panel").width();
				$("#map_canvas").width(widthVal).height(200);
				
			}
			else if(currentPage == "me") {
				$("#new_menu").removeClass("active");
				$("#me_menu").addClass("active");
				$("#recommend_menu").removeClass("activce");
				$("#recommend_btn").removeClass("active");
			}
			else if(currentPage == "") {
				// toolbar 
				
				$(".thumbs_btn").click(function(){
					var currentObj = $(this);
					var valArrays = currentObj.val().split("&");
					var myData = {'food_id' : valArrays[0], 'user_name': valArrays[1]};
					var myDataString = JSON.stringify(myData);
					var cookie = getCookie('csrf_cookie_name');
					//alert(myDataString);
					$.ajax({
						type: 'post',
						url: '/hci-foodiary/ajaxFood/likeFood',
						data: {'data': myDataString, 'csrf_test_name':cookie},
						ContentType: "application/json",
						error:function(xhr, ajaxOptions, thrownError) {//any errors?
							alert(thrownError);//alert with HTTP error
							//$('.animation_image').hide();//hide loading image
							loading = false;
						},
						success:function(result){
							//console.log(result);
							if(result == "") {
								alert("You already checked");
							}
							else {
								var rootObj = currentObj.parent(".btn-group").parent(".btn-toolbar").parent(".thumbnail");
								rootObj.children(".user_info_area").children(".row").children(".like_div").children(".like_label").children(".like_num").html(result);
							}
						}
					});
					
				});
			}
			
			$('#facebook').click(function(e) {
		    	FB.login(function(response) {
			  		if(response.authResponse) {
				  		parent.location ='facebook_login/login';
			  		}
		 		},{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'});
			});
			
			$('#login_cancle').click(function(){
				window.location.href = "http://117.16.146.70/hci-foodiary";
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

			$(document).on('mouseenter', '.thumbnail', function() {
				    $(this).children(".btn-toolbar").toggleClass('hidden_btn');
				}).on('mouseleave', '.thumbnail', function() {
				    $(this).children(".btn-toolbar").toggleClass('hidden_btn');
				});

			
	    	$(document).ready(function() {
				// input rating value
				$('.starrr').on('starrr:change', function(e, value){
				  //alert('new rating is ' + value);
				  $('#rating-val').val( value );
				});
				
				
				
				var offset = 9; //total loaded record group(s)
				var loading  = false; //to prevents multipal ajax loads
				var cookie = getCookie('csrf_cookie_name');
				
				$(window).scroll(function() {//detect page scroll
					if ($(window).scrollTop() + $(window).height() == $(document).height())//user scrolled to bottom of the page?
					{
						// Total Count 
						//if (track_load <= total_groups && loading == false)//there's more data to load
						if (loading == false)
						{
							loading = true;	//prevent further ajax loading

							//load data from the server using a HTTP POST request
							var myData = {'offset' : offset};
							var myDataString = JSON.stringify(myData);
							var ajaxbaseURL = '/hci-foodiary/ajaxFood/getMoreFoods'
							var ajaxTotalURL = ajaxbaseURL.concat(currentPage);
							$.ajax({
								type: 'post',
								url: ajaxTotalURL,
								data: {'data': myDataString, 'csrf_test_name':cookie},
								ContentType: "application/json",
								error:function(xhr, ajaxOptions, thrownError) {//any errors?
									alert(thrownError);//alert with HTTP error
									//$('.animation_image').hide();//hide loading image
									loading = false;
								},
								success:function(result){
									$(result).appendTo("#foods");
									console.log(result);
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