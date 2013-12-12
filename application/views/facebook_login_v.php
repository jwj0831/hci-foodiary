<?php  
$this->load->helper('html');
$ses_user=$this->session->userdata('User');


if(empty($ses_user)) {
?>
	

<div class="container">
	<div class="row">
		<form  id="login_form" class="form-signin mg-btm">
	    	<h3 class="heading-desc">
				<button type="button" id="login_cancle" class="close pull-right" aria-hidden="true">×</button>
				Login to Foodiary
			</h3>
			<div class="social-box">
				<div class="row mg-btm">
	             	<div class="col-md-12">
		                <a id="facebook" class="btn btn-primary btn-block">
		                  <i class="icon-facebook"></i>    Login with Facebook
		                </a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
		                <a href="#" class="btn btn-info btn-block" >
		                  <i class="icon-twitter"></i>    Login with Twitter
		                </a>
		            </div>
	          	</div>
			</div>
      	</form>
	</div>
</div>	
	
	
	
<?php
} else {
	echo '<img src="https://graph.facebook.com/'. $ses_user['id'] .'/picture" width="30" height="30"/><div>'.$ses_user['name'].'</div>';	
	echo '<a href="'.$this->session->userdata('logout').'">Logout</a>';
		
}
?>
<div id="fb-root"></div>
<script type="text/javascript">
	window.fbAsyncInit = function() {
     	FB.init({ 
       		appId:'<?php echo $this->config->item('appId'); ?>', cookie:true, 
       		status:true, xfbml:true,oauth : true 
     	});
   	};
   
	(function(d){
   		var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    	if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
	}(document));
 

</script>