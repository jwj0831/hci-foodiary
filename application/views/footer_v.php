			<footer id="footer">
				<div>Copyright by 2013 HCI Proj.</div>
			</footer>
		</div><!--/#wrapper -->
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
		    <script>
    	$(document).ready(function() {
		    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
		    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
		});
    </script>
	</body>
</html>