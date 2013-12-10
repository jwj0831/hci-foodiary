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
			    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
			    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
			
				// input rating value
				$('.starrr').on('starrr:change', function(e, value){
				  //alert('new rating is ' + value);
				  $('#rating-val').val( value );
				});
				
				$("#upload-btn").click(function(){
					if($("#food_name").val() == ""){
						alert('Please Input Food name');
						return false;
					}
					else{
						$("#upload_action").submit();
					}
				});
			});
			
 	  	</script>
	</body>
</html>