<?php  

$this->load->helper('html');
$ses_user=$this->session->userdata('User');

if(empty($ses_user)) { 
	echo img(array('src'=>'/static/images/facebook.png','id'=>'facebook','style'=>'cursor:pointer;float:left;margin-left:550px;margin-top: 100px;'));
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